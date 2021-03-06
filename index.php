<?php

namespace Calculator;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use Calculator\Controller\IndexController;
use Calculator\Controller\CalculateController;
use Calculator\View\ViewRenderer;



if (isset($_GET['route']) === false) {
    $controller = new IndexController();
    $controller->indexAction();
} else {
    if ($_GET['route'] === 'calculateFreedom') {
        $controller = new CalculateController();
        $controller->calculateFreedomAction();
    }
}


