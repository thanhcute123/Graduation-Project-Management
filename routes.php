<?php

class Router
{

    /* Routes array where we store the various routes defined. */
    private $routes;
    const APP_PREFIX = "Graduation-Project-Management/";

    /* The methods adds each route defined to the $routes array */
    function add_route($route, callable $closure)

    {
        $this->routes[$route] = $closure;
    }

    /* Execute the specified route defined */
    function execute()
    {
        $path = substr($_SERVER['REQUEST_URI'], strlen(self::APP_PREFIX));

//        echo "<h1>$path<h1>";

        /* Check if the given route is defined,
        * or execute the default '/' home route.
        */
        if (array_key_exists($path, $this->routes)) {
            $this->routes[$path]();
        } else {
            $this->routes['/']();
//            header('Location: index.php?controller=pages&action=error');
        }
    }
}