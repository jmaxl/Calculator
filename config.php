<?php
/**
 * root path
 */
define('ROOT_PATH', getcwd());

$config = include ROOT_PATH.'/configuration.php';
define('CONFIG', $config);