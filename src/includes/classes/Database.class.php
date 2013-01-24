<?php

/**
 *
 * ReflexCMS by James King
 * © ReflexCMS, All Rights Reserved.
 *
 * Please see https://github.com/Jamesking56/ReflexCMS for full information & support
 *
 * Licensed under the Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License. Please see ../LICENSING.md for details.
 * 
 */
if(!defined('IN_REFLEX')){ die("HACK ATTEMPT!"); }

/**
* Database Class - Manages all connections with the Database.
*
* Currently only supports MySQL through PDO.
*/
class Database
{
	private $type;
	private $conn;

	function __construct($type="mysql", $host="localhost", $port=false, $username="root", $password="", $name="reflexcms")
	{
		global $error;
		$type = strtolower($type);
		$dsn = "";
		switch ($type) {
			case 'mysql':
				$dsn = $type.":host=".$host.";dbname=".$name;
				if($port)
					$dsn += "port:".$port;
				break;
			
			default:
				$error->triggerError("Database type ".$type." is not supported in this version of ReflexCMS.", "FATAL");
				break;
		}

		$this->type = $type;
		$this->conn = $this->connect($dsn, $username, $password);
	}

	private function connect($dsn, $username, $password)
	{
		global $error;
		try {
			$this->conn = new PDO($dsn, $username, $password);
		} catch (PDOException $e) {
			if(isset($error))
				$error->triggerError("Could not connect to Database: ".$e->getMessage());
			else
				throw new PDOException("Could not connect to Database: ".$e->getMessage());
		}
	}
}

?>