<h1>ceci est la homepage</h1>
<a href="/contact">contact</a>
<br>
<a href="<?= $router->generate('zzz') ?>">contact avec generate</a>
<br>
<a href="<?= $router->generate('article', ['id' => 60, 'slug' => 'nimp']) ?>">aze</a>