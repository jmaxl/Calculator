<?php

declare(strict_types=1);

namespace Calculator\Controller;

use Calculator\View\ViewRenderer;

class IndexController
{
    const LANGUAGE = 'de';

    public function indexAction()
    {
        $template = 'basic.twig';
        $config = CONFIG[self::LANGUAGE];
        $renderer = new ViewRenderer();
        $renderer->renderTemplate($template, $config);
    }
}