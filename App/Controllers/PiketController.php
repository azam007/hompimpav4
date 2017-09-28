<?php

namespace App\Controllers;
use \App\Core\Controller as Controller;
use \App\Core\Config as Config;

class PiketController extends Controller
{ 
	private $piket;

	public function __construct()
	{
		session_start();
		$this->piket = $this->model('Piket');
	}
	public function index()
	{
		$this->piket->tugas = isset($_POST['tugas']) ? ucwords($_POST['tugas']) : "";
		$this->piket->orang = isset($_POST['orang']) ? $_POST['orang'] : "";

		$submit 	  = isset($_POST['submit']) ? $_POST['submit'] : '';

		if ($submit) {
			$this->piket->add();
		}

		return $this->view('Piket',[
			'count'  => $this->piket->count(),
			'piket'  => $this->piket->index(),
			'jumlah' => $this->piket->jumlah()
		]);
	}
	public function edit($id)
	{
		$this->piket->tugas = isset($_POST['tugas']) ? ucwords($_POST['tugas']) : "";
		$this->piket->orang = isset($_POST['orang']) ? $_POST['orang'] : "";

		$data = $this->piket->indexByID($id);

		if(isset($_POST['submit'])){
			$update = $this->piket->update($id);
			$_SESSION['message'] = ['success' => Config::NOTIF_UPDATE_SUCCESS];
			header('location:'.PATH_GLOBALS.'piket');
		}
		return $this->view('EditPiket', $data);
	}
	public function delete($id)
	{
		$delete = $this->piket->delete($id);
		if($delete){
			$_SESSION['message'] = ['success' => Config::NOTIF_DELETE_SUCCESS];
			header('location:'.PATH_GLOBALS.'piket');
		}else{
			$_SESSION['message'] = ['danger' => Config::NOTIF_DELETE_FAILED];
			header('location:'.PATH_GLOBALS.'piket');
		}
	}
	public function on($id){
		$on = $this->piket->updateStatus('1',$id);
		if($on){
			header('location:'.PATH_GLOBALS.'piket');
		}
	}
	public function off($id)
	{
		$off = $this->piket->updateStatus('0',$id);
		if($off){
			header('location:'.PATH_GLOBALS.'piket');
		}
	}
}
