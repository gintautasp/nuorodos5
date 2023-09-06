<?php

	class Kategorija {
	
		public $id, $pav;    																	// čia reiktu pasipildyti !

		public function __construct( $nr ) {
		
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
		
			global $db;	

			$yra = false;
		
			$kategorija = $_POST [ 'kategorija' . $nr ];
			
			$uzklausa =
					"
				SELECT * FROM `kategorijos` WHERE `pav`='" . $kategorija . "'
					";

			// echo $uzklausa;
			
			$kategoriju_saraso_resursas = $db -> uzklausa ( $uzklausa );
			
			if ( $gauta_kategorija =  mysqli_fetch_assoc ( $kategoriju_saraso_resursas ) ) {
			
				$this -> id = $gauta_kategorija [ 'id' ]; 

				$yra = true;
			}
			return $yra;
		}
																					
		public function sukurtiKategorijaDuomenuBazeje () {
		
			global $db;
			
			$uzklausa =
"
				INSERT INTO `kategorijos` (  `pav` ) VALUES(
					'" . $this -> pav . "'
				)
					";
																														// echo $uzklausa;
			$db -> uzklausa ( $uzklausa, 'last_insert_id' );

			$this -> id = $db -> last_insert_id;		
		}
	}