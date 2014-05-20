<?php include("header.php"); ?>

<h2>Panier</h2>

<?php

session_start();

$array = unserialize($_SESSION['panier']);
echo "<br />";
$total = 0;

echo "<table style='border-spacing: 0;'>";

foreach ($array as $elem)
{
	$resultat = mysqli_query($con, "SELECT * FROM item WHERE id = $elem");
	$donne = mysqli_fetch_assoc($resultat);
	echo "<tr><td><p class='crop'><img src='" . $donne['img'] . "' style='height: 100px; width: 100px;' /></p>" . $donne['name']." : ".$donne['price']." $ - <a href='panier_delete.php?item=" . $elem . "'>Supprimer</a></td></tr>";
	$total += $donne['price'];
	mysqli_free_result($resultat);
}

echo "</table>";

echo "TOTAL: $total $<br />";

?>
<html><body>
	<p><a href="panier_history.php">Anciennes commandes</a>
	<br /><a href="delete_item.php">Vider son panier</a>
	<br /><?php session_start();
		if ($_SESSION['loggued_on_user']) { ?><a href="item_save.php"><?php } else { ?><a href="sub_login.php"><?php } ?>Valider<br />
	</p>
</body></html>

<?php include("bottom.php"); ?>
