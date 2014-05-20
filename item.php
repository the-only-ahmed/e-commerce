<?php include("header.php"); ?>

<?php
$id = $_GET["item"];
$resultat = mysqli_query($con, "SELECT * FROM item WHERE id=$id ORDER BY id");
if (mysqli_num_rows($resultat) == 0)
	echo "<p class='italic'>L'objet recherché n'existe pas.</p>";
else
{
	$donne = mysqli_fetch_assoc($resultat);
	$id = $donne["category_id"];
?>

<h2><?php echo stripslashes($donne["name"]); ?></h2>

<table class="item">
	<tr>
		<td style="vertical-align: top;">
			<img src="<?php echo stripslashes($donne['img']); ?>" style="max-width: 250px; max-height: 350px;" />
		</td>
		<td style="vertical-align: top;">
			<p style="text-align: justify;"><?php echo stripslashes($donne["description"]); ?></p><p style="text-align: right;">Prix : <?php echo stripslashes($donne["price"]); ?>$<br />
			<a href="item_add.php?item=<?php echo stripslashes($donne['id']); ?>"><input type="submit" value="Ajouter au panier"></a></p>
		</td>
	</tr>
</table>

<?php
}
?>

<?php include("bottom.php"); ?>
