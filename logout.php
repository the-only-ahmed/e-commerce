<?php include("header.php"); ?>
<?php
session_start();
foreach ($_SESSION as $i => $elem)
{
	if ($i == 'panier')
		continue;
	$_SESSION[$i] = NULL;
}
header ("Location: index.php");
?>
<?php include("bottom.php"); ?>
