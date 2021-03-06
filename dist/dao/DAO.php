<?php

class DAO {

  // Properties

  private static $dbHost = "ID281937_20192020.db.webhosting.be";
	private static $dbName = "ID281937_20192020";
	private static $dbUser = "ID281937_20192020";
  private static $dbPass = "Tigra4life";
	private static $sharedPDO;
	protected $pdo;

  // Constructor
	function __construct() {

    if(empty(self::$sharedPDO)) {

      $dbHost = getenv('PHP_DB_HOST') ?: "localhost";
      $dbName = getenv('PHP_DB_DATABASE') ?: "Humo";
      $dbUser = getenv('PHP_DB_USERNAME') ?: "Humo";
      $dbPass = getenv('PHP_DB_PASSWORD') ?: "Humo";

			self::$sharedPDO = new PDO("mysql:host=" . $dbHost . ";dbname=" . $dbName, $dbUser, $dbPass);
			self::$sharedPDO->exec("SET CHARACTER SET utf8");
			self::$sharedPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			self::$sharedPDO->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		}

		$this->pdo =& self::$sharedPDO;

	}

  // Methods

}

 ?>
