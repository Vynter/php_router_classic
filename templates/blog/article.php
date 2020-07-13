<h1> article et blog :<?= $params['slug'] . ' ' . $params['id'] ?> </h1>
<a href="/">Retour à home</a>
<?php
$js = "<script> 

alert('on est dans aricle {$params['slug']} id {$params['id']} ');

</script>"
?>