<?php

namespace Calculator\Service;


use Calculator\ValueObject\MonthlyPayment;
use Calculator\ValueObject\Rental;
use Calculator\ValueObject\StartCapital;
use Calculator\ValueObject\FixCosts;

class Calculator
{
    public function savedMoneyPerYear(MonthlyPayment $monthlyPayment): int
    {
        return $monthlyPayment->getMoney() * 12;
    }

    public function calculateFreedom(FixCosts $fixCosts, MonthlyPayment $monthlyPayment, StartCapital $startCapital, Rental $rental)
    {
        $totalAmountOfMoney = ($fixCosts->getMoney() * 12) / $rental->getRental();
        $variable1 = (12 * $monthlyPayment->getMoney() + (($monthlyPayment->getMoney() * 13) / 2)) * $rental->getRental();
        $variable2 = ($totalAmountOfMoney * $rental->getRental()) / $variable1;
        $duration = log($variable2, $rental->getRental());

        return $duration;
    }
}
