<?php

	class Nuoroda {
	
		public $id, $nuoroda, $pav, $kategorijos;
		
		public function __construct() {
		
		}
		
		public function gautiDuomenisIsFormos()  {
			
			$this -> nuoroda = $_POST [ 'nuoroda' ];
			$this -> pav = $_POST [ 'nuorodos_pav' ];
			
			$this -> kategorijos =  array ( $_POST [ 'kategorija1' ], $_POST [ 'kategorija2' ], $_POST [ 'kategorija3' ] );
		}
		
		public function arSaugotiNaujaNuoroda() {
			
			$saugoti = false;
		
			if ( isset ( $_POST [ 'saugoti' ] ) && ( $_POST [ 'saugoti' ] =="Saugoti" ) ) {
			
				$saugoti = true;
				
				echo 'saugoti';
			}
			return $saugoti;
		}
		
		public function issaugotiNuorodaDuomenuBazeje() {
		
			global $db;
			
			$uzklausa =
"
				INSERT INTO `nuorodos` ( `nuoroda`, `pav` ) VALUES(
					'" . $this -> nuoroda . "'
					, '" . $this -> pav . "'
				)
					";

			echo $uzklausa;
			
			$db -> uzklausa ( $uzklausa );	
		}
	}
	