<?php include("header.php"); ?>

<?php
session_start();

$array = unserialize($_SESSION['panier']);
$id = $_GET['item'];
foreach ($array as $i => $elem)
{
	if ($id == $elem)
	{
		print $elem;
		$array[$i] = NULL;
		break ;
	}
}
$array = array_filter($array);
$str = serialize($array);
$_SESSION['panier'] = $str;

header("Location: panier.php");
?>

<?php include("bottom.php"); ?>