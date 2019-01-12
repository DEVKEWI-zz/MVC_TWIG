<?php 

namespace App\Models;

class Views 
{

	public static function loadView(String $view, $data = [])
	{

		$loader = new \Twig_Loader_Filesystem('views/');
		$twig = new \Twig_Environment($loader);
		$data['constant'] = get_defined_constants();
		$view = $twig->render($view.'.twig', $data);
		return $view;

	}

	public static function loadTemplate(String $view, Array $data = [])
	{

		$output = self::loadHeader($data);
		$output .= self::loadView($view, $data);
		$output .=  self::loadFooter();

		return $output;

	}

	public static function loadHeader(Array $data = []) 
	{

		if(empty($data['title'])) $data['title'] = DEFAULT_TITLE;

		return self::loadView('template/header', $data);

	}

	public static function loadFooter(Array $data = [])
	{

		return self::loadView('template/footer', $data);

	}

}