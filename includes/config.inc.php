<?php
$kep_mappa = './media/';
$kep_tipusok = array ('.jpg', '.png', '.jpeg');
$mediatipusok = array('image/jpeg', 'image/png');
$datum_formatum = "Y.m.d. H:i";
$max_meret = 500*1024;
	
$ablakcim = array(
    'cim' => 'Magyarország legmagasabb hegyei',
);

$fejlec = array(
	'cim' => 'Magyarország legmagasabb hegyei',
	'motto' => ''
);

$lablec = array(
    'copyright' => 'Minden jog fenntartva '.date("Y").' -',
    'keszito' => 'Dietrich Szilvia'
);

$oldalak = array(
	'/' => array('fajl_nev' => 'fooldal', 'szoveg' => 'Főoldal'),
	'kapcsolat' => array('fajl_nev' => 'kapcsolat', 'szoveg' => 'Kapcsolat'),
	'galeria' => array('fajl_nev' => 'galeria', 'szoveg' => 'Galéria')
);

$hiba_oldal = array ('fajl_nev' => '404_hiba', 'szoveg' => 'Hoppá! Nem találjuk az oldalt.');
?>