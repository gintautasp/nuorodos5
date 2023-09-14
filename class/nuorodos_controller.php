<?php

	class NuorodosController extends Controller {
	
		public $main_dir, $nuoroda;
	
		public function __construct( $main_dir ) {
		
			$this -> main_dir = $main_dir;
		
			parent::__construct();
		}
		
		public function arSaugotiNaujaNuoroda() {
			
			$saugoti = false;
		
			if ( isset ( $_POST [ 'saugoti' ] ) && ( $_POST [ 'saugoti' ] =="Saugoti" ) ) {
			
				$saugoti = true;
																														//	echo 'saugoti';
			}
			return $saugoti;
		}

		public function gautiDuomenisIsFormos()  {
			
			$nuoroda = $_POST [ 'nuoroda' ];
			$pav = $_POST [ 'nuorodos_pav' ];
			
			$kategorijos =  array ( $_POST [ 'kategorija1' ], $_POST [ 'kategorija2' ], $_POST [ 'kategorija3' ] );
			
			$this -> nuoroda = new Nuoroda ( $nuoroda, $pav, $kategorijos );
		}
		
		public function arSaugotiKategorija ( $nr ) {
		
			$saugoti = false;
		
			if ( isset ( $_POST [ 'kategorija' . $nr ] ) && ! empty ( trim ( $_POST [ 'kategorija' . $nr ] ) ) ) {
			
				$saugoti = true;
																											//	echo 'saugoti';
			}
			return $saugoti;
		}

		public function talpintiKategorijoje( $nr ) {

			if ( $this -> arSaugotiKategorija ( $nr ) ) {
			
				$kategorija1 = new Kategorija ( $_POST [ 'kategorija' . $nr ] );
			
				echo  $nr . '-os kategorijos kurimas .';
			
				if ( ! $kategorija1 -> arYraTokiaKategorija () ) {
				
					$kategorija1 -> issaugotiDuomenuBazeje ();
					echo  '. kategorija sukurta';
				}
				
				echo ', kategorijos id: ' . $kategorija1 -> id . '<br>';
				
				$nuorodos_kategorija1 = new NuorodosKategorijos ( $this -> nuoroda -> id, $kategorija1 -> id ); 
				$nuorodos_kategorija1 -> issaugotiDuomenuBazeje();
			}
		}
		
		public function tikrintiUzklausuDuomenis() {
		
			if ( $this -> arSaugotiNaujaNuoroda() ) {
			
				echo 'nuorodos kurimas .';
			
				$this -> gautiDuomenisIsFormos();				// neparašiau praeita karta
			
				$this -> nuoroda -> issaugotiDuomenuBazeje();
				
				echo '. nuoroda sukurta, nuorodos id: ' . $this -> nuoroda -> id . '<br>';
				
				$this -> talpintiKategorijoje ( 1 );
				$this -> talpintiKategorijoje ( 2 );				
				$this -> talpintiKategorijoje ( 3 );
			}
		}
		
		public function arVykdytiPaieska() {
		
			$ieskoti = false;
		
			if ( isset ( $_POST [ 'ieskoti' ] ) && ( $_POST [ 'ieskoti' ] =="Ieškoti" ) ) {
			
				$ieskoti = true;
																															// echo 'ieskoti';
			}		
			return $ieskoti;
		}		
		
		public function gautiDuomenis() {
		
			$this -> duomenys [ 'nuorodos' ] = new Nuorodos();
			
			if ( $this -> arVykdytiPaieska() ) {
			
				echo 'vykdom paieska';
			
				$this -> duomenys [ 'nuorodos' ] -> nustatytiPaieskosReiksmes ( $_POST [ 'paieskos_tekstas' ], $_POST [ 'ieskoti_pagal' ] );
			}
			
			$kategorijos_id = 0;
			
			if ( isset ( $_GET [ 'cat' ] ) ) {
			
				$kategorijos_id = $_GET [ 'cat' ];
			}
			
			$this -> duomenys [ 'nuorodos' ] -> gautiSarasaIsDuomenuBazes( $kategorijos_id );
			
			$this -> duomenys [ 'kategorijos' ] = new Kategorijos();
			
			$this -> duomenys [ 'kategorijos' ] -> gautiSarasaIsDuomenuBazes();
		}
		
		public function pateikti() {
		
			include $this -> main_dir . 'view.php';
		}
	}