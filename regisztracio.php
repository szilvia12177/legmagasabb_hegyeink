<?php
	include('./includes/config.inc.php');
	
    if(isset($_POST['felhasznalo']) && isset($_POST['jelszo']) && isset($_POST['vezeteknev']) && isset($_POST['keresztnev'])) {
        try {
            $dbh = new PDO('mysql:host=' . $adatbazis['host'] . ';dbname=' . $adatbazis['dbname'], $adatbazis['user'], $adatbazis['pw'],
                            array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
            
            $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
            $sth = $dbh->prepare($sqlSelect);
            $sth->execute(array(':bejelentkezes' => $_POST['felhasznalo']));
            if($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $uzenet = "A felhasználói név már foglalt!";
                $ujra = true;
            }
            else {
                $sqlInsert = "insert into felhasznalok(id, csaladi_nev, uto_nev, bejelentkezes, jelszo)
                              values(0, :vezeteknev, :keresztnev, :bejelentkezes, :jelszo)";
                $stmt = $dbh->prepare($sqlInsert); 
                $stmt->execute(array(':vezeteknev' => $_POST['vezeteknev'], ':keresztnev' => $_POST['keresztnev'],
                                     ':bejelentkezes' => $_POST['felhasznalo'], ':jelszo' => sha1($_POST['jelszo']))); 
                if($count = $stmt->rowCount()) {
                    $newid = $dbh->lastInsertId();
                    $uzenet = "Sikeres regisztráció<br>Felhasználóneve: {$_POST['felhasznalo']}";                     
                    $ujra = false;
                }
                else {
                    $uzenet = "A regisztráció nem sikerült.";
                    $ujra = true;
                }
            }
        }
        catch (PDOException $e) {
            echo "Hiba: ".$e->getMessage();
        }      
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Regisztráció</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
                <a href="index.php?oldal=belepes">Próbálja újra!</a>
            <?php } ?>
			<?php if($ujra === false) { ?>
                <a href="index.php?oldal=belepes">Jelentkezzen be!</a>
            <?php } ?>
        <?php } ?>
    </body>  
</html>