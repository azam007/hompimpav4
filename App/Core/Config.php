<?php
/**
 * @author 		Rifqi Khoeruman Azam <rifqinewbi@gmail.com>
 * @copyright 	(c) 2017-2018 Rifqi Khoeruman Azam. All Rights Reserved.
 */
namespace App\Core;

class Config
{
	const
	/*-------------------------------------------*\
	| Konfigurasi Database dan Host               |
	\*-------------------------------------------*/
	DB_HOST 				= 'localhost',
	DB_NAME 				= 'hompimpa',
	DB_USER 				= 'root',
	DB_PASS 				= 'root',

	/*-------------------------------------------*\
	| Konfigurasi PATH  			              |
	\*-------------------------------------------*/
	PATH_CONTROLLERS 		= 'App/Controllers/',
	PATH_MODELS 			= 'App/Models/',
	PATH_VIEWS 				= 'App/Views/',


	/*-------------------------------------------*\
	| NOTIFICATION 					              |
	\*-------------------------------------------*/
	NOTIF_INPUT_SUCCESS 	= 'Data Berhasil diinput',
	NOTIF_INPUT_FAILED  	= 'Data Gagal diinput',
	NOTIF_UPDATE_SUCCESS 	= 'Data Berhasil diperbarui',
	NOTIF_UPDATE_FAILED  	= 'Data Gagal diperbarui',
	NOTIF_DELETE_SUCCESS 	= 'Data Berhasil dihapus',
	NOTIF_DELETE_FAILED 	= 'Data Gagal dihapus'
	;
}