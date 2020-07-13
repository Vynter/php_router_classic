        <?php
        /*
version amélioré
*/

        require('../vendor/autoload.php');
        $uri = $_SERVER['REQUEST_URI'];

        $router = new AltoRouter();
        /**
         * Map a route to a target
         *
         * @param string $method One of 5 HTTP Methods, or a pipe-separated list of multiple HTTP Methods (GET|POST|PATCH|PUT|DELETE)
         * @param string $route The route regex, custom regex must start with an @. You can use multiple pre-set regex filters, like [i:id]
         * @param mixed $target The target where this route should point to. Can be anything.
         * @param string $name Optional name of this route. Supply if you want to reverse route this url in your application.
         *public function map($method, $route, $target, $name = null)*/
        $router->map('GET', '/', 'home');
        $router->map('GET', '/contact', 'contact', 'zzz');// le $name='zzz' est utilisé dans generate
        $router->map('GET', '/blog/[*:slug]-[i:id]', 'blog/article', 'article');
        /*
        * Pour mieux optimiser on peut copier les trois toutes et les mettres
        * dans un repertoir config/router et
        * faire ici un require '../config/routres.pghp'
        */
        $match = $router->match();
        dump($match);

        if (!$match) {
            echo '404';
        } elseif ($match !== null) {

            if (is_callable($match['target'])) {
                call_user_func_array($match['target'], $match['params']);
            } else {
                $params = $match['params'];
                ob_start();
                require "../templates/{$match['target']}.php";
                $pageContent = ob_get_clean(); // function de buffirisation ca resort tout du memo tempon et ca les affiche
            }
            require('../elements/layout.php');
        }


        dump($match);