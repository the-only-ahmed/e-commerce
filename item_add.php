<?php include("header.php"); ?>
<?php

session_start();

$item = $_GET[item];

if ($_SESSION['panier'])
	$array = unserialize($_SESSION['panier']);
$array[] = $item;
$str = serialize($array);
$_SESSION['panier'] = $str;

header("Location: item.php?item=$item");

?>
<?php include("bottom.php"); ?>
