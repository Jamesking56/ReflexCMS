<?php

/**
 * Database Class test for ReflexCMS
 *
 * Tests all Database class functions
 */
define('IN_REFLEX',true);
require_once '../src/includes/classes/Error.class.php';
require_once '../src/includes/classes/Database.class.php';

class DatabaseTest extends PHPUnit_Framework_TestCase
{
	private $db;
	private $error;

	// Setup suite
	function __setUp()
	{
		$this->error = new Error(true, false, false);
		$this->db = new Database($_ENV['DB_TYPE'], $_ENV['DB_HOST'], false, $_ENV['DB_USER'], $_ENV['DB_PASSWD'], $_ENV['DB_DBNAME']);
	}
	function __tearDown()
	{
		$this->db->close();
		$this->db = null;
	}
	function __autoload($className)
	{
		require_once '../src/includes/classes/'.$className.'.class.php';
	}
	// End Setup
	
	/**
	 * @expectedException PDOException
	 */
	public function testIfExceptionIsThrownWhenDatabaseCannotConnect()
	{
		$error = new Error(true);
		$conn = new Database('mysql');
	}
}

?>