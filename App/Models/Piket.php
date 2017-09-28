<?php
namespace App\Models;
use \App\Core\Database as Database;

class Piket
{
	private $_db;
	public $tugas, $orang;

	public function __construct()
	{
		$this->_db = Database::getInstance();
	}
	public function count($params = [])
	{
		return $this->_db->count('piket', $params);
	}
	public function jumlah()
	{
		return $this->_db->select('sum(orang) AS orang','piket',[
			'WHERE' => 'status=1'
		]);
	}
	public function index()
	{
		$index = $this->_db->selectAll('piket') ;
		return $index;
	}
	public function indexByID($id)
	{
		return $this->_db->selectAll('piket', [
			'WHERE' => "id='{$id}'"
		]);
	}
	public function add()
	{
		$add = $this->_db->insert('piket', [
			'tugas' => $this->tugas,
			'orang' => $this->orang
		]);
	}
	public function update($id)
	{
		$update = $this->_db->update('piket',[
			'tugas' => $this->tugas,
			'orang' => $this->orang
		], "id='{$id}'");
	}
	public function delete($id)
	{
		return $this->_db->delete('piket',[
			'WHERE' => "id='{$id}'"
		]);
	}
	public function updateStatus($value, $id)
	{
		return $this->_db->update('piket', [
			'status' => $value
		], "id = '$id'");
	}
}