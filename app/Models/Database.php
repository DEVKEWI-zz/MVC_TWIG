<?php 

namespace App\Models;

class Database
{

	private static $connection = null;

	public static function getInstance()
	{

		if(is_null(self::$connection)) {

			self::$connection = new PDO('mysql:host='.DATABASE_HOST.';dbname='.DATABASE_NAME.';charset=utf8', DATABASE_USER, DATABASE_PASS);

		}

		return self::$connection;

	}

	public function query($sql, $data = [], $getAll = false) 
	{

		$stmt = self::getInstance()->prepare($sql);
		foreach($data as $param => $value) {
			$value = htmlspecialchars($value);
			$value = addslashes($value);
			$stmt->bindValue($param, $value);
		}
		$stmt->execute();

		return ($getAll) ? $stmt->fetchAll() : $stmt->fetch(); 

	}

}