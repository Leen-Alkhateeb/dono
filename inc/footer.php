<div class="modal" id="modal" aria-hidden="true">
  <div class="modal-backdrop" data-close></div>
  <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="mTitle">
    <button class="modal-x" data-close aria-label="Close">✕</button>
    <div class="modal-img"><img id="mImg" src="" alt=""></div>
    <div class="modal-info">
      <span class="dono-card-cat" id="mCat"></span>
      <h3 id="mTitle"></h3>
      <p id="mDesc"></p>
      <ul class="modal-perks"><li>✳ Free handwritten gift note</li><li>✳ Hand-wrapped with love</li><li>✳ Same-day delivery in Amman</li></ul>
      <div class="modal-foot">
        <b id="mPrice"></b>
        <div class="qty"><button type="button" id="qMinus">−</button><span id="qVal">1</span><button type="button" id="qPlus">+</button></div>
      </div>
      <div class="modal-actions">
        <button class="dark-pill" id="mAdd" type="button">Add to cart <span>＋</span></button>
        <button class="fav-btn" id="mFav" type="button" aria-label="Save">♡</button>
      </div>
    </div>
  </div>
</div>

<aside class="drawer" id="drawer" aria-hidden="true">
  <div class="drawer-head"><h3>Your cart ♡</h3><button class="modal-x static" id="drawerClose" aria-label="Close">✕</button></div>
  <div class="drawer-list" id="drawerList"></div>
  <div class="drawer-foot">
    <div class="drawer-total"><span>Total</span><b id="drawerTotal">0 JOD</b></div>
    <button class="dark-pill" id="checkout" type="button">Checkout <span>↗</span></button>
  </div>
</aside>
<div class="drawer-backdrop" id="drawerBackdrop"></div>

<section class="chat-panel" id="giftAssistant" aria-hidden="true" aria-label="Dono gift helper">
  <div class="chat-panel-head"><div><b>Your little gift guide ✨</b><small>Let’s find something lovely</small></div><button type="button" id="giftAssistantClose" aria-label="Close gift guide">×</button></div>
  <div class="chat-messages"><p class="bot-message">Who are we making smile today?</p></div>
  <div class="gift-guide-options">
    <a href="index.php?cat=Flowers#shop">🌷 Flowers</a>
    <a href="index.php?cat=Gift+Boxes#shop">🎁 Gift boxes</a>
    <a href="index.php?cat=Self+Care#shop">🕯️ Self-care</a>
    <a href="index.php?cat=Personalized#shop">💌 Personalised gifts</a>
  </div>
</section>
<button class="chat-float" id="giftAssistantToggle" type="button" aria-label="Open gift guide" aria-expanded="false">
  <svg class="ai-mark" width="29" height="29" viewBox="0 0 32 32" fill="none" aria-hidden="true"><path d="M16 2.5 18.8 12l9.7-3.2-7 7.2 7 7.1-9.7-3.1L16 29.5l-2.8-9.5-9.7 3.1 7-7.1-7-7.2 9.7 3.2L16 2.5Z" fill="currentColor"/><circle cx="25.5" cy="5.5" r="2" fill="#DDF4D3"/></svg>
</button>
<button class="dono-top" id="topButton" aria-label="Back to top">↑</button>
<div id="toast" style="position:fixed;left:50%;bottom:24px;translate:-50% 20px;background:#00341e;color:#d4f5cb;padding:12px 20px;border-radius:99px;z-index:200;opacity:0;transition:.25s;pointer-events:none;font-weight:700"></div>

<script>
  window.DONO = {
    csrf: <?= json_encode(csrf()) ?>,
    products: <?= json_encode(array_column(products(), null, 'id'), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) ?>,
    cart: <?= json_encode(cart_payload(), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP) ?>
  };
</script>
<script src="script.js?v=<?= filemtime(__DIR__ . '/../script.js') ?>"></script>
</body>
</html>
