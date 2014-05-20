<?php include("header.php"); ?>

<script language="javascript">
function verif(id)
{
	if (confirm("Are You sure that you want to delete this Item !!!"))
		window.location.href = "delete_article.php?item=" + id;
}
</script>

<h2>Articles</h2>

<p><a href="add_article.php">Ajouter un article</a></p>

<?php
$resultat = mysqli_query($con, "SELECT * FROM item ORDER BY id");
if (mysqli_num_rows($resultat) == 0)
	echo "<p class='italic'>Il n'y a actuellement aucun article sur le site.</p>";
else
{
	?><table style="width: 100%;"><?php
	while ($donne = mysqli_fetch_assoc($resultat))
	{
		?><tr><?php
		echo "<td style='width:80%;'>".stripslashes($donne['name'])."</td><td><a href='modif_article.php?item=".$donne['id']."'>Modifier</a></td><td><a onclick='verif(".$donne['id'].")' href='#'>Supprimer</a></td>";
		?></tr><?php
	}
	mysqli_free_result($resultat);
	?></table>
	<?php
}?>

<?php include("bottom.php"); ?>
