<?php

	class NuorodosKategorijos extends ModelDbIrasas {
	
		public $id, $id_nuorodos, $id_kategorijos;
		
		public function __construct ( $id_nuorodos, $id_kategorijos ) {
		
			parent::__construct();
		
			$this -> id_nuorodos = $id_nuorodos;
			$this -> id_kategorijos = $id_kategorijos;
		}
		
		public function issaugotiDuomenuBazeje() {
			
			$uzklausa =
					"
				INSERT INTO `nuorodos_kategorijos` ( `id_nuorodos`, `id_kategorijos` ) VALUES(
					'" . $this -> id_nuorodos . "'
					, '" . $this -> id_kategorijos . "'
				)
					";
																														// echo $uzklausa;
			$this -> db -> uzklausa ( $uzklausa );
		}
	}