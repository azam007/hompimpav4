<?php

namespace App\Controllers;
use \App\Core\Controller as Controller;
use \App\Core\Config as Config;

class SantriController extends Controller
{
	private $santri;
	public function __construct()
	{
		session_start();
		$this->santri = $this->model('Santri');
	}
	public function index()
	{
		
		$this->santri->name = isset($_POST['name']) ? $_POST['name'] : "";
		$this->santri->name = explode(',', trim($this->santri->name));
		$pos 		  = array_search("", $this->santri->name); //untuk mencari value kosong

		$submit 	  = isset($_POST['submit']) ? $_POST['submit'] : '';

		if ($pos != 0) {
			unset($this->santri->name[$pos]);
		}
		if ($submit) {
			for ($i=0; $i < count($this->santri->name); $i++) { 
				$this->santri->insert(trim(ucwords($this->santri->name[$i])));
			}
		}
		$this->view('Santri', [
			'count' => $this->santri->count(),
			'santri' => $this->santri->index()
		]);
	}
	public function on($id){
		$on = $this->santri->updateStatus('1',$id);
		if($on){
			header('location:'.PATH_GLOBALS.'santri');
		}
	}
	public function off($id)
	{
		$off = $this->santri->updateStatus('0',$id);
		if($off){
			header('location:'.PATH_GLOBALS.'santri');
		}
	}
	public function delete($id)
	{
		$delete = $this->santri->delete($id);
		if($delete){
			$_SESSION['message'] = ['success' => Config::NOTIF_DELETE_SUCCESS];
			header('location:'.PATH_GLOBALS.'santri');
		}else{
			$_SESSION['message'] = ['danger' => Config::NOTIF_DELETE_FAILED];
			header('location:'.PATH_GLOBALS.'santri');
		}
	}
	public function edit($id)
	{
		$data = $this->santri->indexByID($id);
		if(isset($_POST['submit'])){
			$update = $this->santri->update($id, trim($_POST['name']));
			$_SESSION['message'] = ['success' => Config::NOTIF_UPDATE_SUCCESS];
			header('location:'.PATH_GLOBALS.'santri');
		}
		return $this->view('EditSantri', $data);
	}
}