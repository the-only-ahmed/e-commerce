<?php include("header.php"); ?>

<h2>Commandes archivées</h2>

<?php
	$login = $_SESSION['loggued_on_user'];
	$resultat = mysqli_query($con, "SELECT * FROM user WHERE login='$login' ORDER BY id");
	$donne = mysqli_fetch_assoc($resultat);
	$id = $donne['id'];
	$resultat2 = mysqli_query($con, "SELECT * FROM item_save WHERE user_id=$id ORDER BY id ASC");
	while ($donne2 = mysqli_fetch_assoc($resultat2))
	{
		if (($nb != $donne2['nb']) && ($nb != 0))
			echo "-------------------------------<br />";
		$nb = $donne2['nb'];
		$id2 = $donne2['item_id'];
		$resultat3 = mysqli_query($con, "SELECT * FROM item WHERE id=$id2 ORDER BY id ASC");
		$donne3 = mysqli_fetch_assoc($resultat3);
		echo "Commande #" . $donne2['nb'] . " <a href='../item.php?item=" . $donne3['id'] . "'>" . $donne3['name'] . "</a><br />";
	}
?>

<?php include("bottom.php"); ?>