<?php
session_start();
unset($_SESSION['felhasznalo']);
unset($_SESSION['csaladi_nev']);
unset($_SESSION['uto_nev']);
session_destroy();
header("Location: index.php");
exit();