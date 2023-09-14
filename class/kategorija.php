<?php

	class Kategorija extends ModelDbIrasas {
	
		public $id, $pav;    																	// čia reiktu pasipildyti !

		public function __construct( $nr ) {
		
			parent::__construct();
			$this -> pav = $_POST [ 'kategorija' . $nr ];
		}
																					// sukurti reikalingu metodu antrastes
																					
		public function arSaugotiKategorija ( $nr ) {
		
			$saugoti = false;
		
			if ( isset ( $_POST [ 'kategorija' . $nr ] ) && ! empty ( trim ( $_POST [ 'kategorija' . $nr ] ) ) ) {
			
				$saugoti = true;
																														//	echo 'saugoti';
			}
			return $saugoti;
		}
		
		public function arYraTokiaKategorija ( $nr ) {

			$yra = false;
		
			$kategorija = $_POST [ 'kategorija' . $nr ];
			
			$uzklausa =
					"
				SELECT * FROM `kategorijos` WHERE `pav`='" . $kategorija . "'
					";

			// echo $uzklausa;
			
			$kategoriju_saraso_resursas = $this -> db -> uzklausa ( $uzklausa );
			
			if ( $gauta_kategorija =  mysqli_fetch_assoc ( $kategoriju_saraso_resursas ) ) {
			
				$this -> id = $gauta_kategorija [ 'id' ]; 

				$yra = true;
			}
			return $yra;
		}
																					
		public function issaugotiDuomenuBazeje() {
			
			$uzklausa =
"
				INSERT INTO `kategorijos` (  `pav` ) VALUES(
					'" . $this -> pav . "'
				)
					";
																														// echo $uzklausa;
			$this -> db -> uzklausa ( $uzklausa, 'last_insert_id' );

			$this -> id = $this -> db -> last_insert_id;		
		}
	}