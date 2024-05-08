<table>
    <tr>
        <th>Feladó</th>
        <th>Dátum</th>
        <th>Üzenet</th>
    </tr>
    <?php
		if(isset($_SESSION['felhasznalo'])) 
		{
			$db = new PDO('mysql:host=' . $adatbazis['host'] . ';dbname=' . $adatbazis['dbname'], $adatbazis['user'], $adatbazis['pw'],
								array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
			if (!is_null($db))
			{
				try
				{
					$stmt = $db->query("SELECT * FROM kapcsolat ORDER BY kuldes_ideje DESC");
					while ($row = $stmt->fetch())
					{
						echo '<tr>';
						echo "<td>" . $row['felhasznalo'] . "</td>";
						echo "<td>" . date("Y.m.d H:i:s", strtotime($row['kuldes_ideje'])) . "</td>";
						echo "<td>" . $row['uzenet'] . "</td>";
						echo '</tr>';
					}
				} catch (PDOException $ex) {     echo $ex->getMessage(); }
			}
		}
    ?>
</table>