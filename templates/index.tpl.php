<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	<link rel="stylesheet" href="./styles/galeria.css" type="text/css">
	<?php if(file_exists('./styles/'.$keres['fajl_nev'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl_nev']?>.css" type="text/css"><?php } ?>
</head>
<body>
	<header>
		<h1><?= $fejlec['cim'] ?></h1>
		<?php if (isset($fejlec['motto'])) { ?><h2><?= $fejlec['motto'] ?></h2><?php } ?>
	</header>
    <div id="wrapper">
        <div id="nav">
            <nav>
                <ul>
					<?php foreach ($oldalak as $url => $oldal) { ?>
						<li<?= (($oldal == $keres) ? ' class="active"' : '') ?>>
						<a href="index.php<?= ($url == '/') ? '' : ('?oldal=' . $url) ?>">
						<?= $oldal['szoveg'] ?></a>
						</li>
					<?php } ?>
                </ul>
            </nav>
        </div>
        <div id="content">
            <?php include("./templates/pages/{$keres['fajl_nev']}.tpl.php"); ?>
        </div>
    </div>
    <footer>
		<p>
			<?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
			<?php if(isset($lablec['keszito'])) { ?><?= $lablec['keszito']; ?><?php } ?>
		</p>
    </footer>
</body>
</html>
