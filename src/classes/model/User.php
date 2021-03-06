<?php
declare(strict_types = 1);

namespace Calculator\Model;

use Calculator\ValueObject\Surname;
use Calculator\ValueObject\Firstname;
use Calculator\ValueObject\FixCosts;
use Calculator\ValueObject\Rental;
use Calculator\ValueObject\StartCapital;
use Calculator\ValueObject\MonthlyPayment;

class User 
{
    /** @var Surname $surname */
	protected $surname;

    /** @var Firstname $firstname */
	protected $firstname;

    /** @var FixCosts $fixCosts */
	protected $fixCosts;

    /** @var StartCapital $startCapital */
	protected $startCapital;

    /** @var Rental $rental */
	protected $rental;

    /** @var MonthlyPayment $monthlyPayment */
	protected $monthlyPayment;

	public function __construct(Surname $surname, Firstname $firstname, FixCosts $fixCosts, StartCapital $startCapital, Rental $rental, MonthlyPayment $monthlyPayment)
	{
		$this->setSurname($surname);
		$this->setFirstname($firstname);
		$this->setFixCosts($fixCosts);
		$this->setStartCapital($startCapital);
		$this->setRental($rental);
		$this->setMonthlyPayment($monthlyPayment);
	}

	protected function setSurname(Surname $surname): void
	{
		$this->surname = $surname;
	}

	public function getSurname(): Surname
	{
		return $this->surname;
	}

	protected function setFirstname(Firstname $firstname): void
	{
		$this->firstname = $firstname;
	}

	public function getFirstname(): Firstname
	{
		return $this->firstname;
	}

	public function setFixCosts(FixCosts $fixCosts): void
	{
		$this->fixCosts = $fixCosts;
	}

	public function getFixCosts(): FixCosts
	{
		return $this->fixCosts;
	}
	
	public function setStartCapital(StartCapital $startCapital): void
	{
		$this->startCapital = $startCapital;
	}

	public function getStartCapital(): StartCapital
	{
		return $this->startCapital;
	}

	public function setRental(Rental $rental): void
	{
		$this->rental = $rental;
	}

	public function getRental(): Rental
	{
		return $this->rental;
	}

	public function setMonthlyPayment(MonthlyPayment $monthlyPayment): void
	{
		$this->monthlyPayment = $monthlyPayment;
	}

	public function getMonthlyPayment(): MonthlyPayment
	{
		return $this->monthlyPayment;
	}

	public function getYearlyPayment(): int
	{
		return $this->monthlyPayment->getMoney() * 12;
	}
}