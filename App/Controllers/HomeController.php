<?php

namespace App\Controllers;
use \App\Core\Controller as Controller;
use \App\Core\Config as Config;

class HomeController extends Controller
{
	
	private $santri;
	private $piket;
	private $dataSantri;
	private $dataPiket;

	public function __construct()
	{
		session_start();
		$this->santri = $this->model('Santri');
		$this->piket = $this->model('Piket');

		$this->dataSantri = $this->santri->count([
			'WHERE' => 'status=1'
		]);
		$this->dataPiket = $this->piket->jumlah();
	}
	public function index($tambah)
	{
		return $this->view('Home',[
			'totalSantri' => $this->dataSantri,
			'totalPiket' => $this->dataPiket
		]);
	}
	public function shuffle()
	{
		$acak = $this->model('Acak');
		if(isset($_SESSION['acak'])){
			$_SESSION['acak'] += 1;
		}else{
			$_SESSION['acak'] = 1;
		}
		return $this->view('Home',[
			'acakBiasa' => $acak->biasa(),
			'totalSantri' => $this->dataSantri,
			'totalPiket' => $this->dataPiket
		]);
	}
	public function piketShuffle()
	{
		$acak = $this->model('Acak');
		if($this->dataSantri == $this->dataPiket[0]['orang']){
			if(isset($_SESSION['acakPiket'])){
				$_SESSION['acakPiket'] += 1;
			}else{
				$_SESSION['acakPiket'] = 1;
			}	
			return $this->view('Home',[
				'acakTugas' => $acak->acakTugas(),
				'acakSantri' => $acak->biasa(),
				'totalSantri' => $this->dataSantri,
				'totalPiket' => $this->dataPiket
			]);
		}else{
			header("location:".PATH_GLOBALS.'home');
		}
	}
	public function reset()
	{
		session_destroy();
		header("location:".PATH_GLOBALS.'home');
	}
}