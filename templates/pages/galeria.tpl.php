<form class="feltoltes" action="feltoltes.php" method="post" enctype="multipart/form-data">
	<span class="felirat"><mark>Feltöltés:</mark>&nbsp;</span>
	<input type="file" accept=".jpg,.jpeg,.png" id="fileFeltoltes" name="fileFeltoltes">
	<input type="submit" name="submit" value="Feltöltés">
</form>
<br>
<div class="flex-container">
    <?php
        $fajlok = scandir('media');
        foreach($fajlok as $file)
        {
			$kiterjesztes = substr($file, strrpos($file, '.') + 1);
			if(in_array($kiterjesztes, array("jpg","jpeg","png","gif")))
			{
				echo '  <img src="media/' . $file . '">';
				echo "\r\n";
			}
        }
    ?>
</div>