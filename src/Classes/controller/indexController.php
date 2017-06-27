<?php

declare(strict_types = 1);
namespace Calculator\Controller;

class IndexController
{
	public function indexAction()
	{
		include("view/indexView.php");
	}
}