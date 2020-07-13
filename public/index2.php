<?php



require('../vendor/autoload.php');


$uri = $_SERVER['REQUEST_URI'];
/* 1er solution
if ($uri === '/contact') {
    require '../templates/contact.php';
} elseif ($uri === '/home') {
    require '../templates/home.php';
} else {
    echo '<h1> ERREUR 404 </h1>';
    //dump($_SERVER);
};
*/

$router = new AltoRouter();

$router->map('GET', '/', function () {
    echo 'salut';
});
$router->map('GET', '/contact', function () {
    echo 'contact';
    require('../templates/contact.php');
});
$router->map('GET', '/blog/[*:slug]-[i:id]', function ($slug, $id) {
    echo "je suis sur l'article $slug de l'$id !";
});
$match = $router->match();
dump($match);
/*if ($match !== null) {
    require('../elements/header.php');
    /*
    @param1: function => $router->match();
    @param2: array => $slug, $id (si il y a rien [] ca exécute seulement la function)
    */ /*
    call_user_func_array($match['target'], $match['params']);
    //$match['target']($match['params']['slug'], $match['params']['id']); c pour faire marché le truc avec des params
    require('../elements/footer.php');
} elseif (!$match) {
    echo '404';
}*/
if (!$match) {
    echo '404';
} elseif ($match !== null) {
    require('../elements/header.php');
    call_user_func_array($match['target'], $match['params']);
    require('../elements/footer.php');
}


dump($match);