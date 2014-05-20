<?php include("header.php"); ?>

<script language="javascript">
function verif(id)
{
	if (confirm("Are You sure that you want to delete this user !!!"))
		window.location.href = "delete_user.php?user=" + id;
}
</script>

<h2>Utilisateurs</h2>

<p><a href="add_user.php">Ajouter un utilisateur</a></p>

<?php
$resultat = mysqli_query($con, "SELECT * FROM user ORDER BY power DESC, id ASC");
if (mysqli_num_rows($resultat) == 0)
	echo "<p class='italic'>Il n'y a actuellement aucun utilisateurs sur le site.</p>";
else
{
	?><table style="width: 100%;"><?php
	while ($donne = mysqli_fetch_assoc($resultat))
	{
		?><tr><?php
		echo "<td style='width:80%;'>".stripslashes($donne['login'])."</td><td><a href='modif_user.php?user=".$donne['id']."'>Modifier</a></td><td><a onclick='verif(".$donne['id'].")' href='#'>Supprimer</a></td>";
		?></tr><?php
	}
	mysqli_free_result($resultat);
	?></table>
	<?php
}?>

<?php include("bottom.php"); ?>
