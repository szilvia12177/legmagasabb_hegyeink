<?php
	include('./includes/config.inc.php');
	
	$kuldo = filter_input(INPUT_POST, 'kuldo');
	$uzenet = filter_input(INPUT_POST, 'uzenet');

	if (($kuldo === "") || ($uzenet === ""))
	{
		header("Location: index.php?oldal=kapcsolat2&result=1");
		exit();
	}
	else
	{
		$db = new PDO('mysql:host=' . $adatbazis['host'] . ';dbname=' . $adatbazis['dbname'], $adatbazis['user'], $adatbazis['pw'],
									array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
		if (is_null($db))
		{
			header("Location: index.php?oldal=kapcsolat2&result=2");
			exit();
		}
		else
		{
			try
			{
				$stmt = $db->prepare("INSERT INTO kapcsolat(felhasznalo,uzenet) VALUES(?,?)");
				$stmt->execute([$kuldo, $uzenet]);
				
				$_SESSION['uzenetem'] = $uzenet;

				header("Location: index.php?oldal=kapcsolat3");
				exit();
			}
			catch (PDOException $ex)
			{
				header("Location: index.php?oldal=kapcsolat2&result=2");
				exit();
			}
		}
	}