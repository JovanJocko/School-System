<?php

namespace Router;

/**
 * Class Router
 * @package Router
 */
class Router
{
    /**
     * @var string HOME Home route
     */
    const HOME = '/';

    /**
     * @var string CONTROLLER_ROUTE Controller namespace
     */
    const CONTROLLER_ROUTE = "Controller\\";

    /**
     * @var string DEFAULT_CONTROLLER Default controller name
     */
    const DEFAULT_CONTROLLER = "Home";

    /**
     * @var array $routes Routes array where we store the various routes defined.
     */
    private $routes;

    /**
     * The method adds each route defined to the $routes array
     *
     * @param $route
     * @param $controllerName
     */
    public function addRoute($route, $controllerName) {
        $this->routes[$route] = $controllerName;
    }

    /**
     * Execute the requested route if it's defined
     */
    function execute() {
        $queryString = $_SERVER['QUERY_STRING'];
        $pathArray = explode("=", $queryString);
        $path = self::HOME . $pathArray['0'];
        $params = $pathArray[1] ? $pathArray[1] : '';

        // Check if the given route is defined, or execute the default '/' home route.
        if(array_key_exists($path, $this->routes)) {
            $controllerNameSpace = self::CONTROLLER_ROUTE . $this->routes[$path];
            $controllerName = $this->routes[$path];
        } else {
            $controllerNameSpace = self::CONTROLLER_ROUTE . self::DEFAULT_CONTROLLER;
            $controllerName = self::DEFAULT_CONTROLLER;
        }

        // Check if that controller exists
        if (file_exists('../src/controller/' . $controllerName . '.php')) {
            $controller = new $controllerNameSpace();
            $controller->execute($params);
        } else {
            echo "No such Controller";
        }

    }
}
