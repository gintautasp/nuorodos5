<?php

	$main_dir = __DIR__ .  '/';

	include $main_dir . 'class/nuoroda.php';
	include $main_dir . 'class/nuorodos.php';
	
	$nuoroda = new Nuoroda();
	
	if ( $nuoroda -> arSaugotiNaujaNuoroda() ) {
	
		$nuoroda -> gautiDuomenisIsFormos();				// neparašiau praeitą kartą
	
		$nuoroda -> issaugotiNuorodaDuomenuBazeje();
	}	
	
	$nuorodos = new Nuorodos();
	
	if ( $nuorodos -> arVykdytiPaieska() ) {
	
		$nuorodos -> gautiPaieskosReiksmes();
	}
	
	$nuorodos -> gautiSarasaIsDuomenuBazes();
	
	
	
	