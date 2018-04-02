<?php

class Database{
	private $host = "localhost";
	private $db_name = "dblogin";
	private $db_user = "root";
	private $db_password = "";
	public $conn;

	public function dbConnection(){
		$this->conn = null;
		try{
			$this->conn = new PDO("mysql:host" . $this->host . ";dbname=" . $this->db_name, $this->db_user, $this->db_password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $exception){
			echo "Connection error" . $exception->getMessage();
		}
		return $this->conn;
	}
}