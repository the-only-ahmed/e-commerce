<?php include("header.php"); ?>

<?php
session_start();

if ($_SESSION['loggued_on_user'])
{
	$log = $_SESSION['loggued_on_user'];

	$array = unserialize($_SESSION['panier']);

	$resultat = mysqli_query($con, "SELECT * FROM user WHERE login='$log'");
	$donne = mysqli_fetch_assoc($resultat);
	$user_id = $donne['id'];

	$resultat2 = mysqli_query($con, "SELECT nb FROM item_save WHERE user_id='$user_id' ORDER BY id DESC LIMIT 1");
	$donne2 = mysqli_fetch_assoc($resultat2);
	$nb = $donne2["nb"];
	$nb++;

	foreach ($array as $val)
	{
		$item_id = $val;
		$req_pre = mysqli_prepare($con, 'INSERT INTO item_save (user_id, item_id, nb) VALUES (?, ?, ?)');
		mysqli_stmt_bind_param($req_pre, 'iii', $user_id, $item_id, $nb);
		mysqli_stmt_execute($req_pre);
	}

	unset($_SESSION['panier']);
}

header("Location: panier.php");

?>

<?php include("bottom.php"); ?>
