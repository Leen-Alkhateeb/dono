<?php
$p = fn($id,$title,$cat,$price,$img,$desc,$tag='') =>
    compact('id','title','cat','price','img','desc','tag');

return [
  $p(1,'The Soft Morning Box','Gift Boxes',32,'image/ekaterina-shevchenko-ZLTlHeKbh04-unsplash.jpg','A pastel box of little everyday magic: candle, sweets and a handwritten note.','Most loved'),
  $p(2,'A Little Bloom Moment','Flowers',24,'image/micheile-henderson-Afjk-6oFzPE-unsplash.jpg','Seasonal blooms wrapped in sage paper, with a tiny gift box on the side.','Favourite'),
  $p(3,'Sunday Reset Hamper','Self Care',38,'image/toa-heftiba-gxLzAjHayUs-unsplash.jpg','Bath salts, a soft candle and a face mask. A deep breath, in a box.','Reset'),
  $p(4,'The Happy Snack Edit','Treats',18,'image/olivia-bollen-3BvVFcZIL7I-unsplash.jpg','Chocolate, cookies and sweet little things for instant happiness.','Sweet'),
  $p(5,'Cozy Evening Basket','For Home',45,'image/dhiraj-kumar-gVgG2Km7RG4-unsplash.jpg','Throw, tea and a candle. Everything for a slow evening at home.','Cozy'),
  $p(6,'Bear Hug Surprise','Personalized',29,'image/superkitina-GIImjW5MzAA-unsplash.jpg','A soft teddy with a personalised name tag and a message card.','Made for them'),
  $p(7,'Emerald Gift Set','Gift Boxes',41,'image/baibhav-kumar-LumWaD-gTLQ-unsplash.jpg','An elegant green set, wrapped with satin ribbon and a wax seal.','New'),
  $p(8,'Blush Peony Bouquet','Flowers',35,'image/keytion-13WiuT2kf1A-unsplash.jpg','Soft blush blooms, hand-tied and ready to make someone smile.'),
  $p(9,'Spa Day In A Box','Self Care',52,'image/raelle-cameron-GvE8vd_cjGw-unsplash.jpg','A full pamper set: scrub, oil, mask and a scented candle.','Bestseller'),
  $p(10,'Sweet Tooth Crate','Treats',26,'image/olivia-bollen-3BvVFcZIL7I-unsplash.jpg','Twelve hand-picked treats for the one with a sweet tooth.'),
  $p(11,'Warm Hug Throw Set','For Home',58,'image/dhiraj-kumar-gVgG2Km7RG4-unsplash.jpg','A chunky throw with a mug and hot chocolate. Comfort in the cutest form.'),
  $p(12,'Their Name, Your Thought','Personalized',34,'image/laura-chouette-eGBXbKtjbik-unsplash.jpg','A custom engraved keepsake box with their name and your note.','Custom'),
  $p(13,'Sunny Day Daisies','Flowers',19,'image/keytion-13WiuT2kf1A-unsplash.jpg','Bright daisies and sunflowers for the just-because days.'),
  $p(14,'The Thank You Box','Gift Boxes',22,'image/grace-anne-bobadilla-_PyacZLIViw-unsplash.jpg','A small but mighty box that says thank you, beautifully.'),
  $p(15,'Slow Morning Kit','Self Care',27,'image/toa-heftiba-gxLzAjHayUs-unsplash.jpg','Tea, hand cream and a lip balm for slow mornings.'),
  $p(16,'Chocolate Lovers Tray','Treats',31,'image/olivia-bollen-3BvVFcZIL7I-unsplash.jpg','A tray of premium chocolates in six different flavours.','Yum'),
  $p(17,'Little Home Glow','For Home',21,'image/dhiraj-kumar-gVgG2Km7RG4-unsplash.jpg','Two soy candles and a matchbox. Small light, big mood.'),
  $p(18,'Initials Teddy','Personalized',44,'image/rosebox-BFdSCxmqvYc-unsplash.jpg','A premium plush with their embroidered initials.'),
  $p(19,'Grand Celebration Box','Gift Boxes',65,'image/wedding-dreamz-XsriYQ1oowc-unsplash.jpg','The big one: for birthdays, weddings and big moments.','Luxe'),
  $p(20,'Garden Mix Bouquet','Flowers',42,'image/micheile-henderson-Afjk-6oFzPE-unsplash.jpg','A lush garden-style bouquet with eucalyptus and roses.'),
  $p(21,'Calm & Cozy Hamper','Self Care',36,'image/raelle-cameron-GvE8vd_cjGw-unsplash.jpg','Eye mask, herbal tea and a soft candle in one calm box.'),
  $p(22,'Mini Treat Bag','Treats',12,'image/olivia-bollen-3BvVFcZIL7I-unsplash.jpg','A tiny bag of happiness. Perfect for a small thank you.','Under 15'),
  $p(23,'Pretty Shelf Set','For Home',39,'image/grace-anne-bobadilla-_PyacZLIViw-unsplash.jpg','A little vase, a candle and a tray to make any shelf prettier.'),
  $p(24,'Message In A Box','Personalized',27,'image/kateryna-hliznitsova-RYZ4f7mAHtc-unsplash.jpg','Your own words printed on a beautiful keepsake card box.'),
];
