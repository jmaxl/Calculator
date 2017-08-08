<?php

declare(strict_types = 1);
namespace Calculator\Controller;

use Calculator\View\ViewRenderer;

class IndexController
{
	public function indexAction()
	{
        $template = 'basic.twig';

        $variables = ['variable' => 'Hallo zusammen!123'];

        $renderer = new ViewRenderer();
        $renderer->renderTemplate($template, $variables);
	}
}