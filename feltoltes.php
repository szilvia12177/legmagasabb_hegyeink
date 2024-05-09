<?php
	include('./includes/config.inc.php');
	
$target_dir = $kep_mappa;
$target_file = $target_dir . basename($_FILES["fileFeltoltes"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// image is valid
	if (isset($_POST["submit"]))
	{
		
		$ellenorzes = getimagesize($_FILES["fileFeltoltes"]["tmp_name"]);
		if($ellenorzes === false)
		{
			header("Location: index.php?oldal=galeria&result=1");
			exit();
		}
	}

	if (file_exists($target_file))
	{
		header("Location: index.php?oldal=galeria&result=2");
		exit();
	}

	if ($_FILES["fileFeltoltes"]["size"] > $max_meret)
	{
		header("Location: index.php?oldal=galeria&result=3");
		exit();
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
	{
		header("Location: index.php?oldal=galeria&result=4");
		exit();
	}

	if (move_uploaded_file($_FILES["fileFeltoltes"]["tmp_name"], $target_file))
	{
		header("Location: index.php?oldal=galeria");
		exit();
	}
	else
	{
		header("Location: index.php?oldal=galeria&result=5");
		exit();
	}