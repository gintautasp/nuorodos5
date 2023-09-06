<?php

	$main_dir = __DIR__ .  '/';
	
	include 'conf.php';
	
	include $conf [ 'dir_bendra' ] . 'duomenu_baze.class.php';

	$db = new DuomenuBaze ( $conf [ 'name_db' ], $conf [ 'name_user_db' ], $conf [ 'password_user_db' ] );

	include $main_dir . 'class/nuoroda.php';
	include $main_dir . 'class/nuorodos.php';
	
	$nuoroda = new Nuoroda();
	
	echo 'nuorodos kūrimas';
	
	if ( $nuoroda -> arSaugotiNaujaNuoroda() ) {
	
		$nuoroda -> gautiDuomenisIsFormos();				// neparašiau praeitą kartą
	
		$nuoroda -> issaugotiNuorodaDuomenuBazeje();
	}	
	
	$nuorodos = new Nuorodos();
	
	if ( $nuorodos -> arVykdytiPaieska() ) {
	
		$nuorodos -> gautiPaieskosReiksmes();
	}
	
	$nuorodos -> gautiSarasaIsDuomenuBazes();
	
	
	
	