<?php include("header.php"); ?>
<?php

session_start();
$_SESSION['panier'] = NULL;
header("Location: panier.php");

?>
<?php include("bottom.php"); ?>
