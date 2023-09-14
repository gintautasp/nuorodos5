<?php

	class Nuoroda extends ModelDbIrasas {
	
		public $id, $nuoroda, $pav, $kategorijos;
		
		public function __construct( $nuoroda, $pav, $kategorijos ) {
		
			$this -> nuoroda = $nuoroda;
			$this -> pav = $pav;
			$this -> kategorijos = $kategorijos;
		
			parent::__construct();
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
	