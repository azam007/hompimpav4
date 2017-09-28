<?php
/**
 * @author 		Rifqi Khoeruman Azam <rifqinewbi@gmail.com>
 * @copyright 	(c) 2017-2018 Rifqi Khoeruman Azam. All Rights Reserved.
 */
namespace App\Core;
use \PDO;

class Database
{
	private static $_instance;
	private $database;

	public function __construct()
	{
		$this->database = new PDO('mysql:host='.Config::DB_HOST.';dbname='.Config::DB_NAME.';', Config::DB_USER, Config::DB_PASS);
	}
	public static function getInstance()
	{
		if(!isset(self::$_instance)){
			self::$_instance = new Database();
		}
		return self::$_instance;
	}
	public function insert($table, $params)
	{
		$query = "INSERT INTO {$table} SET ";
		foreach ($params as $column => $value) {
			$query .= $column.'=\''.$value.'\', ';
		}
		$query = substr($query,0, strrpos($query,','));
		return $this->database->query($query);
	}
	public function update($table, $params, $where)
	{
		$query = "UPDATE {$table} SET ";
		foreach ($params as $column => $value) {
			$query .= $column.'=\''.$value.'\', ';
		}
		$query .= 'WHERE '.$where;
		$query = substr_replace($query, '', strrpos($query,',') ,1);
		return $this->database->query($query);
	}
	public function selectAll($table,$params = [])
	{
		$reply = [];
		$query = "SELECT * FROM $table ";
		foreach ($params as $key => $value) {
			$query .= $key.' '.$value.' ';
		}
		$query = trim($query);
		$result = $this->database->query($query);

		while($row = $result->fetch(PDO::FETCH_ASSOC))
			$reply[] = $row;

		return $reply;
	}
	public function select($pilih, $table, $params = [])
	{
		$reply = [];
		$query = "SELECT $pilih FROM $table ";
		foreach ($params as $key => $value) {
			$query .= $key.' '.$value.' ';
		}
		$query = trim($query);
		$result = $this->database->query($query);

		while($row = $result->fetch(PDO::FETCH_ASSOC))
			$reply[] = $row;

		return $reply;
	}
	public function delete($table, $params)
	{
		$query = "DELETE FROM $table ";
		foreach ($params as $key => $value) {
			$query .= $key.' '.$value.' ';
		}
		$query = trim($query);
		return $this->database->query($query);
	}
	public function count($table, $params = [])
	{
		$query = "SELECT * FROM $table ";
		foreach ($params as $key => $value) {
			$query .= $key.' '.$value.' ';
		}
		$query = trim($query);
		$query = $this->database->query($query);
		return $query->rowCount();
	}
}