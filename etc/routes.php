<?php

use Router\Router as Router;

$router = new Router();

$router->addRoute(Router::HOME, 'Home');
$router->addRoute('/student', 'Student');
$router->addRoute('/addSchool', 'AddSchool');

$router->execute();
