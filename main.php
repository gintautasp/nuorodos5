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
	
	$nuoroda = new Nuoroda();
	
	if ( $nuoroda -> arSaugotiNaujaNuoroda() ) {
	
		echo 'nuorodos kūrimas .';
	
		$nuoroda -> gautiDuomenisIsFormos();				// neparašiau praeitą kartą
	
		$nuoroda -> issaugotiDuomenuBazeje();
		
		echo '. nuoroda sukurta, nuorodos id: ' . $nuoroda -> id . '<br>';
		
		$kategorija1 = new Kategorija ( 1 );
		
		if ( $kategorija1 -> arSaugotiKategorija ( 1 ) ) {
		
			echo 'pirmos kategorijos kūrimas .';
		
			if ( ! $kategorija1 -> arYraTokiaKategorija ( 1 ) ) {
			
				$kategorija1 -> sukurtiKategorijaDuomenuBazeje ();
				echo  '. kategorija sukurta';
			}
			
			echo ', kategorijos id: ' . $kategorija1 -> id . '<br>';
			
			$nuorodos_kategorija1 = new NuorodosKategorijos ( $nuoroda -> id, $kategorija1 -> id ); 
			$nuorodos_kategorija1 -> issaugotiDuomenuBazeje();
		}
		
		$kategorija2 = new Kategorija ( 2 );		
		
		if ( $kategorija2 -> arSaugotiKategorija ( 2 ) ) {
		
			if ( ! $kategorija2 -> arYraTokiaKategorija ( 2 ) ) {
			
				$kategorija2 -> sukurtiKategorijaDuomenuBazeje ();
			}
			
			$nuorodos_kategorija2 = new NuorodosKategorijos ( $nuoroda -> id, $kategorija2 -> id ); 
			$nuorodos_kategorija2 -> issaugotiDuomenuBazeje();
		}
		
		$kategorija3 = new Kategorija ( 3 );		

		if ( $kategorija3 -> arSaugotiKategorija ( 3 ) ) {
		
			if ( ! $kategorija3 -> arYraTokiaKategorija ( 3 ) ) {		
		
				$kategorija3 -> sukurtiKategorijaDuomenuBazeje ();
			}
			
			$nuorodos_kategorija3 = new NuorodosKategorijos ( $nuoroda -> id, $kategorija3 -> id );
			$nuorodos_kategorija3 -> issaugotiDuomenuBazeje();
		}
	}	
	
	$nuorodos = new Nuorodos();
	
	if ( $nuorodos -> arVykdytiPaieska() ) {
	
		echo 'vykdom paieska';
	
		$nuorodos -> gautiPaieskosReiksmes();
	}
	
	$kategorijos_id = 0;
	
	if ( isset ( $_GET [ 'cat' ] ) ) {
	
		$kategorijos_id = $_GET [ 'cat' ];
	}
	
	$nuorodos -> gautiSarasaIsDuomenuBazes( $kategorijos_id );
	
	$kategorijos = new Kategorijos();
	
	$kategorijos -> gautiSarasaIsDuomenuBazes();	
	
	
	
	