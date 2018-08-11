<?php
class MyDatabase
{
	private $connection;
	private $host = "localhost";
	private $database = "home";
	private $user = "janko";
	private $password = "8b56689a3a";

	private $settings = array(
	 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES => false,
    );

    public function __construct()
    {
    	if (!isset($this->connection))
    	{
    		$this->connection = @new PDO(
    			"mysql:host=$this->host;dbname=$this->database",
    			$this->user,
    			$this->password,
    			$this->settings
    		);
    	}
    }

    public function databaseQuery($query, $parameters = array())
    {
    	$dbReturn = $this->connection->prepare($query);
    	$dbReturn->execute($parameters);
    	return $dbReturn->fetchAll();
    }
}