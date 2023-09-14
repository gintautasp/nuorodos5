<?php

	class Nuoroda extends ModelDbIrasas {
	
		public $id, $nuoroda, $pav, $kategorijos;
		
		public function __construct() {
		
			parent::__construct();
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
																														//	echo 'saugoti';
			}
			return $saugoti;
		}
		
		public function issaugotiDuomenuBazeje() {
			
			$uzklausa =
"
				INSERT INTO `nuorodos` ( `nuoroda`, `pav` ) VALUES(
					'" . $this -> nuoroda . "'
					, '" . $this -> pav . "'
				)
					";
																														// echo $uzklausa;
			$this -> db -> uzklausa ( $uzklausa, 'last_insert_id' );

			$this -> id = $this -> db -> last_insert_id;
		}
	}
	