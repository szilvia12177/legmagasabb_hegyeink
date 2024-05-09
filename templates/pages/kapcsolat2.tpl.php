<div class="col xs12">
	<br><br>
	<p>Üzenetküldés:</p>
	<div class="col xs12">
		<div class="<?php if (filter_input(INPUT_GET, 'result') !== null) { echo 'error'; } else { echo 'hidden'; } ?>">
			<p>
				<?php
					if (filter_input(INPUT_GET, 'result') !== null)
					{
						$result = filter_input(INPUT_GET, 'result');
						switch ($result)
						{
							case '1';
								echo 'Minden mező kitöltése kötelező!';
								break;

							case '2';
								echo 'Adatbázis kapcsolati hiba!';
								break;

							default:
								echo '';
						}
					}
				?>
			</p>
		</div>
	</div>
	<div class="col xs12">
		<form action="uzenetkuldes.php" id="kapcsolatform" name="kapcsolatform" method="POST" onsubmit="return ellenorzes()">
			<div class="row">
				<div class="col xs12 m6 l4 xl3">
					<div class="container contact">
						<label class="white" for="kuldo">Név: </label>
						<input type="text" id="kuldo" name="kuldo" value= <?php if(isset($_SESSION['felhasznalo'])) { echo $_SESSION['felhasznalo']; } else { echo "Vendég"; } ?> readonly class="szovegdoboz"><br>
					</div>
				</div>
				<div class="col xs12 m6 l8 xl9">
					<div class="container">
						<br>
						<textarea id="uzenet" name="uzenet" placeholder="Üzenet..." onkeyup="tipp(this.value)" class="szovegdoboz2"></textarea>
						<br>
						<input type="submit" value="Küldés">
					</div>
				</div>
				<br>
				<mark><span id="tipp"></span></mark>
			</div>
		</form>
	</div>
	<script>
		function ellenorzes() {
		  let kuldo = document.forms["kapcsolatform"]["kuldo"].value;
		  let uzenet = document.forms["kapcsolatform"]["uzenet"].value;
		  if (kuldo == "") {
			alert("A küldő nem lehet üres.");
			return false;
		  }
		  if (uzenet == "" || uzenet.length < 5) {
			alert("Az üzenet nem lehet 5 karakternél rövidebb.");
			return false;
		  }
		}
		
		function tipp(str) {
		  if (str.length == 0) {
			  document.getElementById("kuldo").innerHTML = "";
			  return;
		  } else {
			  var xmlhttp = new XMLHttpRequest();
			  xmlhttp.onreadystatechange = function() {
				  if (this.readyState == 4 && this.status == 200) {
					  document.getElementById("tipp").innerHTML = this.responseText;
				  }
			  };
			  xmlhttp.open("GET", "tipp.php?q=" + str, true);
			  xmlhttp.send();
		  }
		}
	</script>
</div>