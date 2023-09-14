<!DOCTYPE html>
<html lang="lt">
<head>
	<meta charset="utf-8">
	<title>Nuorodos</title>
	<style>
		h1 {
			text-align: center;
			font-size: 24px;
		}
		#nuorodu_sarasas, #nuorodos_ivedimas, #paieska {
			display: block;
			margin-left: 16%;
		}
		#kategoriju_sarasas {
			float: left;
			padding: 10px;
			width: 15%;
		}
		.nuoroda, .kategorija {
			padding: 5px 7px;
		}
		.label, .label1_3 {
			margin-top: 7px;
		}
		.input, .input1_3  {
			margin-bottom: 7px;
		}
		label, input, hr {
			width: 80%;
		}
		input[type=checkbox] {
			width: auto;
		}
		hr {
			margin-left: 0;
		}
		.label1_3, .input1_3 {
			display: inline-block;
			width: 20%;
			margin-right: 12px;
		}
		.button {
			width: 20%;
			float: right;
			margin-right: 25%;			
		}
		.clear {
			clear: right;
			margin-bottom: 12px;
		}
		.kategorija a, .nuoroda a {
			color: DarkCyan;
			text-decoration: none;
		}
		.kategorija a:hover, .nuoroda a:hover {
			color: DarkKhaki;
			text-decoration: underline;
		}		
	</style>
</head>
<body>
<section id="kategoriju_sarasas">
	<div class="kategorija">
		<a href="?cat=0" target="_self">
			Visos kategorijos
		</a>
	</div>
<?php
		foreach ( $this -> duomenys [ 'kategorijos' ] -> sarasas as $kategorija ) {
?>
	<div class="kategorija">
		<a href="?cat=<?= $kategorija [ 'id' ] ?>" target="_self">
			<?= $kategorija [ 'pav' ] ?>
		</a>
	</div>
<?php
		}
?>
</section>
<h1>Nuorodos</h1>
<section id="paieska">
	<form method="post" action="">
		<div class="label">
			<label for="paieskos_tekstas">Paieška</label>
		</div>
		<div class="input">		
			<input type="search" name="paieskos_tekstas" id="paieskos_tekstas">
		</div>
		<div class="label">
			<label for="ieskoti_pagal">Ieškoti pagal</label>
		</div>		
		<div class="input">
			<input type="checkbox" name="ieskoti_pagal[]" value="url" checked> - nuorodą
			<input type="checkbox" name="ieskoti_pagal[]" value="pav" checked> - nuorodos pavadinimą
			<input type="checkbox" name="ieskoti_pagal[]" value="kat" checked> - kategoriją
		</div>
		<hr>
		<div class="input">		
			<input class="button" type="submit" name="ieskoti" value="Ieškoti">
		</div>
	</form>
		<div class="clear"></div>
</section>
<section id="nuorodos_ivedimas">
	<form method="post" action="">
		<div class="label">
			<label for="nuoroda">Nuoroda</label>
		</div>
		<div class="input">
			<input type="url" required name="nuoroda" id="nuoroda">
		</div>
		<div class="label">		
			<label for="nuorodos_pav">Nuorodos pavadinimas</label>
		</div>
		<div class="input">		
			<input type="text" required name="nuorodos_pav" id="nuorodos_pav">
		</div>
		<div class="label1_3">		
			<label for="kategorija1">Kategorija </label>
		</div>
		<div class="label1_3">		
			<label for="kategorija2">Kategorija </label>
		</div>
		<div class="label1_3">		
			<label for="kategorija3">Kategorija </label>
		</div>
		<br>
		<div class="input1_3">		
			<input list="kategorijos" name="kategorija1" id="kategorija1">
		</div>
		<div class="input1_3">		
			<input list="kategorijos" name="kategorija2" id="kategorija2">
		</div>
		<div class="input1_3">		
			<input list="kategorijos" name="kategorija3" id="kategorija3">		
			<datalist id="kategorijos">
				<option value="Programavimas">
				<option value="Rinkodara">
				<option value="Dizainas">
			</datalist>		
		</div>
		<hr>
		<div class="input">		
			<input class="button" type="submit" name="saugoti" value="Saugoti">
		</div>
		<div class="clear"></div>		
	</form>
</section>
<section id="nuorodu_sarasas">
<?php
		foreach ( $this -> duomenys [ 'nuorodos' ] -> sarasas as $nuoroda ) {
?>
	<div class="nuoroda">
		<a href="<?= $nuoroda [ 'nuoroda' ] ?>" target="_blank">
			<?= $nuoroda [ 'pav' ] ?>
		</a>
	</div>
<?php
		}
?>
</section>
</body>
</html>