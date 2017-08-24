<?php

declare(strict_types = 1);
namespace Calculator\Controller;

use Calculator\Model\UserFactory;
use Calculator\View\ViewRenderer;

class CalculateController
{
	public function calculateFreedomAction()
	{
		$userFactory = new UserFactory();
		$user = $userFactory->getUserByPostParameter($_POST);

        $template = 'result.twig';

        $variables = ['user' => $user];

        $renderer = new ViewRenderer();
        $renderer->renderTemplate($template, $variables);
	}
}
