<?php

namespace Calculator\Service;


use Calculator\ValueObject\FixCosts;
use Calculator\ValueObject\MonthlyPayment;
use Calculator\ValueObject\Rental;
use Calculator\ValueObject\StartCapital;
use Calculator\ValueObject\Inflation;

class Calculator
{
    /**
     * @param MonthlyPayment $monthlyPayment
     * @return int
     */
    public function savedMoneyPerYear(MonthlyPayment $monthlyPayment): int
    {
        return $monthlyPayment->getMonthlyPayment() * 12;
    }

    /**
     * @param MonthlyPayment $monthlyPayment
     * @param Rental         $rental
     * @param StartCapital   $startCapital
     * @param FixCosts       $fixCosts
     * @param Inflation      $inflation
     * @return float
     */
    public function getYearsToFinancialFreedom(MonthlyPayment $monthlyPayment, Rental $rental, StartCapital $startCapital, FixCosts $fixCosts, Inflation $inflation)
    {
        $neededCapital = $this->getNeededFinancialFreedomCapital($rental, $fixCosts, $inflation);
        $savedMoneyPerYear = $this->savedMoneyPerYear($monthlyPayment);
        $partialRentalPerYear = $this->getPartialRentalPerYear($monthlyPayment, $rental, $inflation);

        $yearlySavedMoneyWithRental = $savedMoneyPerYear + $partialRentalPerYear;

        $logYear = ($neededCapital - $startCapital->getStartCapital()) * ($rental->getRental() - $inflation->getInflation()) / $yearlySavedMoneyWithRental + 1;

        return log($logYear, ($rental->getRental() - $inflation->getInflation() + 1));
    }

    /**
     * JULIUS
     *
     * @param FixCosts       $fixCosts
     * @param MonthlyPayment $monthlyPayment
     * @param StartCapital $startCapital
     * @param Rental       $rental
     * @return float
     */
    public function calculateFreedom(FixCosts $fixCosts, MonthlyPayment $monthlyPayment, StartCapital $startCapital, Rental $rental)
    {
        $totalAmountOfMoney = ($fixCosts->getMoney() * 12) / $rental->getRental();
        $variable1 = (12 * $monthlyPayment->getMoney() + (($monthlyPayment->getMoney() * 13) / 2)) * $rental->getRental();
        $variable2 = ($totalAmountOfMoney * $rental->getRental()) / $variable1;
        $duration = log($variable2, $rental->getRental());

        return $duration;
    }

    /**
     * @param Rental    $rental
     * @param FixCosts  $fixCosts
     * @param Inflation $inflation
     * @return float
     */
    protected function getNeededFinancialFreedomCapital(Rental $rental, FixCosts $fixCosts, Inflation $inflation): float
    {
        return $fixCosts->getFixCosts() / ($rental->getRental() - $inflation->getInflation()) * 12;
    }

    /**
     * @param MonthlyPayment $monthlyPayment
     * @param Rental         $rental
     * @param Inflation      $inflation
     * @return float
     */
    protected function getPartialRentalPerYear(MonthlyPayment $monthlyPayment, Rental $rental, Inflation $inflation): float
    {
        return $monthlyPayment->getMonthlyPayment() * 6.5 * ($rental->getRental() - $inflation->getInflation());
    }
}
