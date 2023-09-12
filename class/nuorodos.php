<?php

	class Nuorodos {
	
		public $paieskos_tekstas = '', $ieskoti_pagal = array(), $sarasas = array();
		
		public function __construct() {
		
		}		
		
		public function arVykdytiPaieska() {
		
			$ieskoti = false;
		
			if ( isset ( $_POST [ 'ieskoti' ] ) && ( $_POST [ 'ieskoti' ] =="Ieškoti" ) ) {
			
				$ieskoti = true;
																														//	echo 'saugoti';
			}		
		
			return $ieskoti;
		}
		
		public function gautiPaieskosReiksmes() {
		
			$this -> paieskos_tekstas = $_POST [ 'paieskos_tekstas' ];
			
			$this -> ieskoti_pagal = array_values ( $_POST [ 'ieskoti_pagal' ] );
			
			print_r ( $this -> ieskoti_pagal  );
		}
	
		public function gautiSarasaIsDuomenuBazes( $kategorijos_id ) {
		
			global $db;
			
			$uzklausa =
					"
				SELECT 
					`nuorodos`.*
				FROM 
					`nuorodos`
				LEFT JOIN 
					`nuorodos_kategorijos` ON (
						`nuorodos`.`id`=`nuorodos_kategorijos`.`id_nuorodos`
					)
				LEFT JOIN `kategorijos` ON (
						`nuorodos_kategorijos`.`id_kategorijos`=`kategorijos`.`id`
					)
				WHERE 
						1
					";
			
			if ( intval ( $kategorijos_id ) > 0 ) {
				
				$uzklausa .= 
					"
					AND
						`nuorodos_kategorijos`.`id_kategorijos`=" . $kategorijos_id . "
					";
			}
			
			if ( ( $this -> paieskos_tekstas != '' ) && ( $this -> ieskoti_pagal ) ) {
			
					$prideti_or = '';
					
					$uzklausa .=
							"
						AND (	
							";
			
					if ( in_array ( 'url', $this -> ieskoti_pagal ) ) {
					
						$uzklausa .= 
							"
								`nuorodos`.`nuoroda` LIKE( '%" . $this -> paieskos_tekstas . "%' )
							";
						$prideti_or = 'OR';
					}
				
					if ( in_array ( 'pav', $this-> ieskoti_pagal ) ) {
					
						$uzklausa .= 
							"
							" . $prideti_or . "
								`nuorodos`.`pav` LIKE( '%" . $this ->paieskos_tekstas . "%' )
							";
						$prideti_or = 'OR';							
					}	
			
					if ( in_array ( 'kat', $this -> ieskoti_pagal ) ) {
					
						$uzklausa .= 
							"
							" . $prideti_or . "
								`kategorijos`.`pav` LIKE( '%" . $this -> paieskos_tekstas . "%' )
							";					
					}
					$uzklausa .=
							"
						)	
							";					
			}
			
			$uzklausa .= 
					"			
				GROUP BY
					`nuorodos`.`id`
					";
																														// echo $uzklausa;
			$nuorodu_saraso_resursas = $db -> uzklausa ( $uzklausa );
			
			while ( $nuoroda =  mysqli_fetch_assoc ( $nuorodu_saraso_resursas ) ) {

				$this -> sarasas[] = $nuoroda;
			}
		}
	}