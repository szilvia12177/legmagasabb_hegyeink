<?php
	include('./includes/config.inc.php');
	
	session_start();
	
    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
        try {
            $dbh = new PDO('mysql:host=' . $adatbazis['host'] . ';dbname=' . $adatbazis['dbname'], $adatbazis['user'], $adatbazis['pw'],
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            $sqlSelect = "select id, csaladi_nev, uto_nev from felhasznalok where bejelentkezes = :bejelentkezes and jelszo = sha1(:jelszo)";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => $_POST['jelszo']));
            $row = $sth->fetch(PDO::FETCH_ASSOC);
			
			if(!empty($row)) {
				$_SESSION['csaladi_nev'] = $row['csaladi_nev'];
				$_SESSION['uto_nev'] = $row['uto_nev'];
				$_SESSION['felhasznalo'] = $_POST['felhasznalo'];	
			}
						
			header("Location: index.php");
            exit();
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Belépés</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($row)) { ?>
            <?php if($row) { ?>
                <h1>Bejelentkezett:</h1>
                Azonosító: <strong><?= $row['id'] ?></strong><br><br>
                Név: <strong><?= $row['csaladi_nev']." ".$row['uto_nev'] ?></strong>
				<a href="index.php">Vissza a főoldalra</a>
            <?php } else { ?>
                <h1>Hiba történt a bejelentkezésnél!</h1>
                <a href="index.php?oldal=belepes">Próbálja újra!</a>
            <?php } ?>
        <?php } ?>
    </body>
</html>