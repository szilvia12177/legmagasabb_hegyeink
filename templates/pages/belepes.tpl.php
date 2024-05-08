<div>
	<h3>Bejelentkezés</h3>
    <form action = "belepes.php" method = "post">
      <fieldset>
        <legend>Bejelentkezés</legend>
        <br>
        <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br><br>
        <input type="password" name="jelszo" placeholder="Jelszó" required><br><br>
        <input type="submit" name="belepes" value="Belépés">
        <br>&nbsp;
      </fieldset>
    </form>
    <h3>Regisztrálja magát, ha még nem felhasználó!</h3>
    <form action = "regisztracio.php" method = "post">
      <fieldset>
        <legend>Regisztráció</legend>
        <br>
        <input type="text" name="vezeteknev" placeholder="Vezetéknév" required><br><br>
        <input type="text" name="keresztnev" placeholder="Keresztnév" required><br><br>
        <input type="text" name="felhasznalo" placeholder="Felhasználónév" required><br><br>
        <input type="password" name="jelszo" placeholder="Jelszó" required><br><br>
        <input type="submit" name="regisztracio" value="Regisztráció">
      </fieldset>
    </form>
</div>
