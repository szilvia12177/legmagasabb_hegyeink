<?php
$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    
	if($len < 5)
	{
		$hint = "Ez még túl rövid!";
	}
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "" : $hint;
?>