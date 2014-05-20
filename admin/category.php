<?php include("header.php"); ?>

<script language="javascript">
function verif(id)
{
	if (confirm("Are You sure that you want to delete this Category !!!"))
		window.location.href = "delete_category.php?category=" + id;
}
</script>

<h2>Catégories</h2>

<p><a href="add_category.php">Ajouter une catégorie</a></p>

<?php
$resultat = mysqli_query($con, "SELECT * FROM category ORDER BY id");
if (mysqli_num_rows($resultat) == 0)
	echo "<p class='italic'>Il n'y a actuellement aucune catégorie sur le site.</p>";
else
{
	?><table style="width: 100%;"><?php
	while ($donne = mysqli_fetch_assoc($resultat))
	{
		?><tr><?php
		echo "<td style='width:80%;'>".stripslashes($donne['name'])."</td><td><a href='modif_category.php?category=".$donne['id']."'>Modifier</a></td><td><a onclick='verif(".$donne['id'].")' href='#'>Supprimer</a></td>";
		?></tr><?php
	}
	mysqli_free_result($resultat);
	?></table>
	<?php
}?>

<?php include("bottom.php"); ?>
