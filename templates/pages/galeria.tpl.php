<div class="<?php if (filter_input(INPUT_GET, 'result') !== null) { echo 'error'; } else { echo 'hidden'; } ?>">
    <p>
        <?php
            if (filter_input(INPUT_GET, 'result') !== null)
            {
                $result = filter_input(INPUT_GET, 'result');
                switch ($result)
                {
                    case '1';
                        echo 'A kiválasztott fájl nem képfájl!';
                        break;
                    
                    case '2';
                        echo 'Azonos nevű fájl már létezik a szerveren!';
                        break;
                    
                    case '3';
                        echo 'A kép nem lehet nagyobb, mint 500 KB!';
                        break;

                    case '4';
                        echo 'Csak JPG, JPEG és PNG formátumok engedélyezettek!';
                        break;

                    case '5';
                        echo 'Egyéb hiba!';
                        break;
                    
                    default:
                        echo '';
                }
            }
        ?>
    </p>
</div>
<form class="<?php if(isset($_SESSION['felhasznalo'])) { echo "feltoltes"; } else { echo "no_felhasznalo"; } ?> " action="feltoltes.php" method="post" enctype="multipart/form-data">
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