<?php 

namespace App\Controllers;

use App\Controllers\ControllerInterface as ControllerInterface;
use App\Models\Views as Views;

class Error implements ControllerInterface 
{


	public function error()
	{

		return Views::loadTemplate('pages/404');

	}

}