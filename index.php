<?php
require __DIR__ . '/inc/functions.php';
$f = read_filters($_GET);
$list = filter_products($f);
$total = count($list);
$catCounts = ['All' => count(products())];
foreach (products() as $p) $catCounts[$p['cat']] = ($catCounts[$p['cat']] ?? 0) + 1;
include __DIR__ . '/inc/header.php';
?>
<main class="catalog-page" id="shop">
  <section class="shop-intro shop-intro-minimal" aria-label="Shop gifts">
    <div class="shop-intro-copy">
      <h1>Find their <em>kind of gift.</em></h1>
    </div>
  </section>
  <div class="filter-overlay" id="filterOverlay"></div>
  <div class="catalog-layout">
    <aside class="filter-sidebar" id="filterSidebar" aria-hidden="true">
      <div class="filter-heading"><h2>Filters</h2><div class="filter-head-actions"><a href="index.php#shop">Reset</a><button class="filter-close" id="filterClose" type="button" aria-label="Close filters">×</button></div></div>
      <form id="shopForm" action="index.php#shop" method="get">
        <label class="side-search"><span>⌕</span><input id="shopSearch" name="q" type="search" value="<?= e($f['q']) ?>" placeholder="Search gifts..." aria-label="Search products"></label>
        <h3>Category</h3>
        <div class="side-categories">
        <?php foreach (CATEGORIES as $key => $label): ?>
          <a class="<?= $f['cat'] === $key ? 'active' : '' ?>" href="<?= e(shop_url($f, ['cat'=>$key])) ?>"><span><?= e($label) ?></span><b><?= $catCounts[$key] ?? 0 ?></b></a>
        <?php endforeach; ?>
        </div>
        <h3>Price</h3>
        <div class="side-budget">
          <?php foreach (['all'=>'Any budget','under25'=>'Under 25 JOD','25to40'=>'25–40 JOD','over40'=>'40+ JOD'] as $v=>$label): ?>
          <label><input type="radio" name="price" value="<?= $v ?>" <?= $f['price']===$v?'checked':'' ?>><span><?= $label ?></span></label>
          <?php endforeach; ?>
        </div>
        <input type="hidden" name="cat" value="<?= e($f['cat']) ?>">
        <h3>Sort by</h3>
        <select name="sort" aria-label="Sort products" data-auto>
          <?php foreach (['featured'=>'Featured','low'=>'Price: low to high','high'=>'Price: high to low','name'=>'Name A–Z'] as $v=>$label): ?>
          <option value="<?= $v ?>" <?= $f['sort']===$v?'selected':'' ?>><?= $label ?></option>
          <?php endforeach; ?>
        </select>
        <button class="side-apply" type="submit">Apply filters</button>
        <button class="favorites-filter side-fav" id="favoritesOnly" type="button" aria-pressed="false">♡ Favorites only</button>
      </form>
    </aside>
    <section class="catalog-results" aria-label="Gift products">
      <div class="catalog-toolbar"><span id="productCount"><b><?= $total ?></b> thoughtful finds<?php if ($f['q']!=='' || $f['cat']!=='All' || $f['price']!=='all'): ?> · <a class="clear-filters" href="index.php#shop">Clear</a><?php endif; ?></span><span class="toolbar-sort-label">PICKED WITH LOVE <b aria-hidden="true">✳</b></span></div>
      <div class="shop-products" id="products">
      <?php if (!$list): ?><div class="shop-empty"><b>Nothing here yet ♡</b>Try a different word, category or budget.<br><a href="index.php#shop"><button type="button">Show all gifts</button></a></div><?php endif; ?>
      <?php foreach ($list as $i=>$p): ?>
        <article class="dono-card flip-card" data-id="<?= $p['id'] ?>" style="--i:<?= $i ?>" tabindex="0" aria-label="<?= e($p['title']) ?>">
          <div class="flip-card-inner">
            <div class="flip-face flip-front">
              <img src="<?= e($p['img']) ?>" alt="<?= e($p['title']) ?>" loading="<?= $i<8?'eager':'lazy' ?>">
              <?php if ($p['tag']): ?><span class="dono-card-tag"><?= e($p['tag']) ?></span><?php endif; ?>
              <button class="dono-save" type="button" data-act="fav" aria-label="Save <?= e($p['title']) ?>" aria-pressed="false">♡</button>
            </div>
            <div class="flip-face flip-back">
              <span class="flip-back-label"><?= e($p['cat']) ?> <span aria-hidden="true">/</span> THE DETAILS</span>
              <div class="product-rating" aria-label="Rated <?= number_format(4.6 + (($p['id'] * 7) % 5) / 10, 1) ?> out of 5">
                <span class="rating-stars" aria-hidden="true">★★★★★</span>
                <strong><?= number_format(4.6 + (($p['id'] * 7) % 5) / 10, 1) ?></strong>
                <span class="rating-reviews">(<?= 28 + (($p['id'] * 13) % 170) ?> reviews)</span>
              </div>
              <h3 class="dono-card-title"><?= e($p['title']) ?></h3>
              <p class="flip-back-desc"><?= e($p['desc']) ?></p>
              <div class="flip-back-bottom"><span class="dono-price"><?= $p['price'] ?> <small>JOD</small></span><button class="add-btn" type="button" data-act="add">Add to bag <span>＋</span></button></div>
              <div class="flip-back-actions"><button type="button" class="flip-again" data-act="flip" aria-label="Flip back to photo">Back to photo</button></div>
            </div>
          </div>
        </article>
      <?php endforeach; ?>
      </div>
    </section>
  </div>
</main>
<?php include __DIR__ . '/inc/footer.php'; ?>
