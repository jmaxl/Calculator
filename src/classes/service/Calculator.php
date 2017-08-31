<?php
/**
 * Created by PhpStorm.
 * User: jml
 * Date: 31.08.17
 * Time: 21:33
 */

namespace Calculator\Service;


use Calculator\ValueObject\MonthlyPayment;

class Calculator
{
    public function savedMoneyPerYear(MonthlyPayment $monthlyPayment): int
    {
        return $monthlyPayment->getMoney() * 12;
    }
}