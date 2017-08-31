<?php

declare(strict_types=1);

namespace Calculator\Controller;

use Calculator\Model\UserFactory;
use Calculator\Service\Calculator;
use Calculator\View\ViewRenderer;

class CalculateController
{
    public function calculateFreedomAction()
    {
        $userFactory = new UserFactory();
        $user = $userFactory->getUserByPostParameter($_POST);

        $calculateService = new Calculator();
        $savedMoneyPerYear = $calculateService->savedMoneyPerYear($user->getMonthlyPayment());

        $template = 'result.twig';

        $variables = ['user' => $user, 'savedMoneyPerYear' => $savedMoneyPerYear];

        $renderer = new ViewRenderer();
        $renderer->renderTemplate($template, $variables);
    }
}
