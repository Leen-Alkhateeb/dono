<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params(['httponly' => true, 'samesite' => 'Lax']);
    session_start();
}

/* fallbacks لو mbstring مش مفعّل على السيرفر */
if (!function_exists('mb_substr'))  { function mb_substr(string $s, int $a, ?int $l = null): string { return $l === null ? substr($s, $a) : substr($s, $a, $l); } }
if (!function_exists('mb_stripos')) { function mb_stripos(string $h, string $n): int|false { return stripos($h, $n); } }

const PAGE_SIZE = 8;
const CATEGORIES = [
    'All'          => 'All gifts',
    'Flowers'      => 'Flowers',
    'Gift Boxes'   => 'Gift boxes',
    'Self Care'    => 'Self-care',
    'Treats'       => 'Sweet treats',
    'For Home'     => 'For home',
    'Personalized' => 'Personalized',
];

function e(string|int|float|null $s): string {
    return htmlspecialchars((string)$s, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function products(): array {
    static $list = null;
    return $list ??= require __DIR__ . '/../data/products.php';
}

function product(int $id): ?array {
    foreach (products() as $p) if ($p['id'] === $id) return $p;
    return null;
}

function read_filters(array $src): array {
    $cat   = (string)($src['cat'] ?? 'All');
    $price = (string)($src['price'] ?? 'all');
    $sort  = (string)($src['sort'] ?? 'featured');
    return [
        'q'     => mb_substr(trim((string)($src['q'] ?? '')), 0, 80),
        'cat'   => array_key_exists($cat, CATEGORIES) ? $cat : 'All',
        'price' => in_array($price, ['all','under25','25to40','over40'], true) ? $price : 'all',
        'sort'  => in_array($sort, ['featured','low','high','name'], true) ? $sort : 'featured',
    ];
}

function filter_products(array $f): array {
    $list = array_values(array_filter(products(), function ($p) use ($f) {
        if ($f['q'] !== '') {
            $hay = "{$p['title']} {$p['cat']} {$p['desc']} {$p['tag']}";
            if (mb_stripos($hay, $f['q']) === false) return false;
        }
        if ($f['cat'] !== 'All' && $p['cat'] !== $f['cat']) return false;
        return match ($f['price']) {
            'under25' => $p['price'] < 25,
            '25to40'  => $p['price'] >= 25 && $p['price'] <= 40,
            'over40'  => $p['price'] > 40,
            default   => true,
        };
    }));
    match ($f['sort']) {
        'low'  => usort($list, fn($a, $b) => $a['price'] <=> $b['price']),
        'high' => usort($list, fn($a, $b) => $b['price'] <=> $a['price']),
        'name' => usort($list, fn($a, $b) => strcasecmp($a['title'], $b['title'])),
        default => null,
    };
    return $list;
}

function shop_url(array $f, array $over = []): string {
    $q = array_merge($f, $over);
    $q = array_filter($q, fn($v, $k) => !in_array([$k, $v], [['cat','All'],['price','all'],['sort','featured'],['q','']], true), ARRAY_FILTER_USE_BOTH);
    return 'index.php' . ($q ? '?' . http_build_query($q) : '') . '#shop';
}

function cart_payload(): array {
    $items = []; $count = 0; $total = 0;
    foreach (($_SESSION['cart'] ?? []) as $id => $qty) {
        $p = product((int)$id);
        if (!$p) continue;
        $items[] = ['id'=>$p['id'],'title'=>$p['title'],'img'=>$p['img'],'price'=>$p['price'],'qty'=>$qty];
        $count += $qty; $total += $p['price'] * $qty;
    }
    return ['items'=>$items,'count'=>$count,'total'=>$total];
}

function csrf(): string {
    return $_SESSION['csrf'] ??= bin2hex(random_bytes(16));
}
