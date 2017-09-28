<?php
/**
 * @author 		Rifqi Khoeruman Azam <rifqinewbi@gmail.com>
 * @copyright 	(c) 2017-2018 Rifqi Khoeruman Azam. All Rights Reserved.
 */

namespace App\Core;

class Controller
{
	public function view($filename, $data = [])
	{
		$locFile = '../'.Config::PATH_VIEWS.$filename.'.php';
		if(file_exists($locFile)){
			require '../'.Config::PATH_VIEWS.'Header.php';
			require $locFile;
			include '../'.Config::PATH_VIEWS.'Footer.php';
			return $data;
		}
	}
	public function model($filename)
	{
		$locFile = '../'.Config::PATH_MODELS.$filename.'.php';
		if(file_exists($locFile)){
			$model = "\App\Models\\".$filename;
			return new $model;
		}
	}
}