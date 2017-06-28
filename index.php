<?php

namespace Calculator;

require __DIR__ . '/vendor/autoload.php';
use Calculator\Controller\IndexController;
use Calculator\Controller\CalculateController;


$loader = new \Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new \Twig_Environment($loader, array(
    'cache' => __DIR__ . '/cache',
));

$config = ['variable' => 'Hallo zusammen!'];

echo $twig->render('basic.twig', $config);
exit;

if (isset($_GET['route']) === false) {
    $controller = new IndexController();
    $controller->indexAction();
} else {
    if ($_GET['route'] === 'calculateFreedom') {
        $controller = new CalculateController();
        $controller->calculateFreedomAction();
    }
}


