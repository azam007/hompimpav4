<?php

namespace App\Models;
use \App\Core\Database as Database;

class Santri
{
	private $_db;
	public $name;
	
	public function __construct()
	{
		$this->_db = Database::getInstance();
	}
	public function index()
	{
		$index = $this->_db->selectAll('santri') ;
		return $index;
	}
	public function count($params = [])
	{
		return $this->_db->count('santri', $params);
	}
	public function insert($value)
	{
		return $this->_db->insert('santri', [
			'name' => $value
		]);
	}
	public function updateStatus($value, $id)
	{
		return $this->_db->update('santri', [
			'status' => $value
		], "id = '$id'");
	}
	public function delete($id)
	{
		return $this->_db->delete('santri',[
			'WHERE' => "id='{$id}'"
		]);
	}
	public function indexByID($id)
	{
		return $this->_db->selectAll('santri', [
			'WHERE' => "id='{$id}'"
		]);
	}
	public function update($id, $value)
	{
		return $this->_db->update('santri', [
			'name' => $value
		], "id='{$id}'");
	}
}