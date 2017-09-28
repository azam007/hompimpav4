<?php
namespace App\Models;
use \App\Core\Database as Database;

class Acak
{
	private $_db;

	public function __construct()
	{
		$this->_db = Database::getInstance();
	}
	public function biasa()
	{
		return $this->_db->selectAll('santri', [
			'WHERE' => "status='1'",
			'ORDER BY' => 'rand()'
		]);
	}
	public function acakTugas()
	{
		$datas = $this->_db->selectAll('piket');
		$tugas = '';
		foreach ($datas as $data) {
			$tugas .= str_repeat($data['tugas'].',', $data['orang']);
		}
		$tugas = explode(',', $tugas);
		if($pos = array_search('', $tugas)){
			unset($tugas[$pos]);
		}
		$angkaAcak = rand(20,50);
		for ($i=0; $i < $angkaAcak; $i++) { 
			shuffle($tugas);
		}
		return $tugas;
	}
}