<?php

declare(strict_types = 1);
namespace Calculator\Model;
use Calculator\ValueObject\Surname;
use Calculator\ValueObject\Firstname;
use Calculator\ValueObject\FixCosts;
use Calculator\ValueObject\Rental;
use Calculator\ValueObject\StartCapital;
use Calculator\ValueObject\MonthlyPayment;


class UserFactory
{
	public function getUserByPostParameter(array $post): User
	{
		$surname = Surname::fromString($post["surname"]);
		$firstname = Firstname::fromString($post["firstname"]);
		$fixCosts = FixCosts::fromValue((float) $post["fixCosts"]);
		$startCapital = StartCapital::fromValue((float) $post["startCapital"]);
		$rental = Rental::fromValue((float) $post["rental"]);
		$monthlyPayment = MonthlyPayment::fromValue((float) $post["monthlyPayment"]);
		
		return new User($surname, $firstname, $fixCosts, $startCapital, $rental, $monthlyPayment);
	} 
}