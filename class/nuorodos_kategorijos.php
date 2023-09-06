<?php

	class NuorodosKategorijos {
	
		public $id, $id_nuorodos, $id_kategorijos;
		
		public function __construct ( $id_nuorodos, $id_kategorijos ) {
		
			$this -> id_nuorodos = $id_nuorodos;
			$this -> id_kategorijos = $id_kategorijos;
		}
		
		public function issaugotiDuomenuBazeje() {
		
			global $db;
			
			$uzklausa =
"
				INSERT INTO `nuorodos_kategorijos` ( `id_nuorodos`, `id_kategorijos` ) VALUES(
					'" . $this -> id_nuorodos . "'
					, '" . $this -> id_kategorijos . "'
				)
					";
																														// echo $uzklausa;
			$db -> uzklausa ( $uzklausa );
		}
	}