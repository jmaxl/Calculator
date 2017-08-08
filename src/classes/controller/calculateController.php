<?php

declare(strict_types = 1);
namespace Calculator\Controller;

use Calculator\Model\UserFactory;

class CalculateController
{
	public function calculateFreedomAction()
	{
		$userFactory = new UserFactory();
		$user = $userFactory->getUserByPostParameter($_POST);
		var_dump($user);
	}
}
