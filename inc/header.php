<?php require_once __DIR__ . '/functions.php'; $cartCount = cart_payload()['count']; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#00341e">
<meta name="description" content="Thoughtful gifts for every person, every moment, every kind of love. Find your kind of magic with DONO.">
<title>DONO — Find the feeling. Give the gift.</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Archivo:wght@700;800;900&family=Work+Sans:wght@400;500;600;700;800&family=Caveat:wght@600;700&family=Fraunces:wght@700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/../style.css') ?>">
</head>
<body data-theme="cream">
<div id="bar"></div>

<nav>
  <button class="nav-filter-toggle" id="filterLaunch" type="button" aria-label="Open filters" title="Open filters" aria-controls="filterSidebar" aria-expanded="false">
    <span></span><span></span><span></span>
  </button>
  <div class="nav-links" aria-label="Main navigation">
    <a href="index.php#shop">Shop gifts</a>
    <a href="index.php?cat=Flowers#shop">Flowers</a>
    <a href="index.php?cat=Gift+Boxes#shop">Gift boxes</a>
  </div>
  <form class="search" action="index.php#shop" method="get" role="search">
    <span>⌕</span>
    <input id="navSearch" name="q" type="search" value="<?= e($_GET['q'] ?? '') ?>" placeholder="Find a little something…" aria-label="Search gifts">
  </form>
  <div class="acts">
    <button class="btn cart-btn" id="cartBtn" type="button" aria-label="Open shopping bag">Bag <b id="cartCount"><?= (int)$cartCount ?></b></button>
  </div>
</nav>
