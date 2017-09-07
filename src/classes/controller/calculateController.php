<?php

declare(strict_types=1);

namespace Calculator\Controller;

use Calculator\Model\UserFactory;
use Calculator\Service\Calculator;
use Calculator\ValueObject\Inflation;
use Calculator\View\ViewRenderer;

class CalculateController
{
    public function calculateFreedomAction()
    {
        $inflation = Inflation::fromValue(CONFIG['inflation']);

        $userFactory = new UserFactory();
        $user = $userFactory->getUserByPostParameter($_POST);

        $calculateService = new Calculator();
        $savedMoneyPerYear = $calculateService->savedMoneyPerYear($user->getMonthlyPayment());
        $calculateFreedom = $calculateService->calculateFreedom($user->getFixCosts(), $user->getMonthlyPayment(), $user->getStartCapital(), $user->getRental());
        $financialFreedom = $calculateService->getYearsToFinancialFreedom($user->getMonthlyPayment(), $user->getRental(), $user->getStartCapital(), $user->getFixCosts(), $inflation);

        var_dump($calculateFreedom);
        var_dump($financialFreedom);

        $template = 'result.twig';

        $variables = ['user' => $user, 'savedMoneyPerYear' => $savedMoneyPerYear, 'calculateFreedom' => $calculateFreedom];

        $renderer = new ViewRenderer();
        $renderer->renderTemplate($template, $variables);
    }
}
