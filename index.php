<?php
	include('./includes/config.inc.php');
	
	if (isset($_GET['oldal'])) {
		$oldal = $_GET['oldal'];
		if (isset($oldalak[$oldal]) && file_exists("./templates/pages/{$oldalak[$oldal]['fajl_nev']}.tpl.php")) {
			$keres = $oldalak[$oldal];
		}
		else { 
			$keres = $hiba_oldal;
			header("HTTP/1.0 404 hiba - Nem található");
		}
	}
	else $keres = $oldalak['/'];
	
	include('./templates/index.tpl.php'); 
?>