<?php 

namespace App\Controllers;
use App\Controllers\ControllerInterface as ControllerInterface;
use App\Models\Views as Views;

class Pages implements ControllerInterface 
{

	public function home()
	{

		return Views::loadTemplate('pages/home', []);

	}

	public function exemplo()
	{

		return Views::loadTemplate('pages/exemplao', []);
		
	}

}