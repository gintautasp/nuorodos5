<?php

	$main_dir = __DIR__ .  '/';
	
	include 'conf.php';
	
	include $conf [ 'dir_bendra' ] . 'duomenu_baze.class.php';
	include  $conf [ 'dir_bendra' ] . 'model_db.class.php';
	include  $conf [ 'dir_bendra' ] . 'model_db_irasas.class.php';
	include  $conf [ 'dir_bendra' ] . 'model_db_sarasas.class.php';	

	$db = new DuomenuBaze ( $conf [ 'name_db' ], $conf [ 'name_user_db' ], $conf [ 'password_user_db' ] );

	include $main_dir . 'class/nuoroda.php';
	include $main_dir . 'class/nuorodos.php';
	include $main_dir . 'class/kategorija.php';
	include $main_dir . 'class/kategorijos.php';	
	include $main_dir . 'class/nuorodos_kategorijos.php';
	
	include $conf [ 'dir_bendra' ] . 'controller.class.php';
	include $main_dir . 'class/nuorodos_controller.php';

	$nuorodos_controller = new NuorodosController( $main_dir );
	
	$nuorodos_controller -> tikrintiUzklausuDuomenis();	
	
	$nuorodos_controller -> gautiDuomenis();
	$nuorodos_controller -> pateikti();
	
	
	
	