<?php
declare(strict_types=1);
require __DIR__ . '/inc/functions.php';

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

function out(array $d, int $code = 200): never {
    http_response_code($code);
    echo json_encode($d, JSON_UNESCAPED_UNICODE);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') out(['ok' => true, 'cart' => cart_payload()]);
if ($_SERVER['REQUEST_METHOD'] !== 'POST') out(['ok' => false, 'error' => 'Method not allowed'], 405);

if (!hash_equals(csrf(), (string)($_POST['csrf'] ?? ''))) out(['ok' => false, 'error' => 'Invalid token'], 403);

$action = (string)($_POST['action'] ?? '');
$id     = (int)($_POST['id'] ?? 0);
$qty    = (int)($_POST['qty'] ?? 1);
$cart   = $_SESSION['cart'] ?? [];

switch ($action) {
    case 'add':
        if (!product($id)) out(['ok' => false, 'error' => 'Unknown product'], 404);
        $cart[$id] = min(20, ($cart[$id] ?? 0) + max(1, $qty));
        break;

    case 'set':
        if (!product($id)) out(['ok' => false, 'error' => 'Unknown product'], 404);
        if ($qty <= 0) unset($cart[$id]); else $cart[$id] = min(20, $qty);
        break;

    case 'remove':
        unset($cart[$id]);
        break;

    case 'newsletter':
        if (!empty($_POST['website'])) out(['ok' => true]);
        $email = filter_var(trim((string)($_POST['email'] ?? '')), FILTER_VALIDATE_EMAIL);
        if (!$email) out(['ok' => false, 'error' => 'Please enter a valid email'], 422);

        $file = __DIR__ . '/data/subscribers.csv';
        $fh = fopen($file, 'ab');
        if (!$fh) out(['ok' => false, 'error' => 'Could not save'], 500);
        flock($fh, LOCK_EX);
        fputcsv($fh, [date('c'), $email]);
        flock($fh, LOCK_UN);
        fclose($fh);
        out(['ok' => true, 'message' => 'Welcome to the DONO world ♡']);

    default:
        out(['ok' => false, 'error' => 'Unknown action'], 400);
}

$_SESSION['cart'] = $cart;
out(['ok' => true, 'cart' => cart_payload()]);
