<?php include("header.php"); ?>

<?php
session_start();
$id = $_GET["category"];
$_SESSION["id"] = $id;
$resultat = mysqli_query($con, "SELECT * FROM category WHERE id=$id ORDER BY id");
$donne = mysqli_fetch_assoc($resultat);
?>

<h2>Modifier une catégorie</h2>
<table class="login">
	<form action="modif_category_post.php" method="POST">
	<tr>
		<td>
			Nom :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="name" value="<?php echo stripslashes($donne['name']) ?>">
		</td>
	</tr>
	<tr>
		<td>
			Description :
		</td>
		<td>
			<textarea style="width: 95%;" type="textfield" name="description"><?php echo stripslashes($donne['description']) ?></textarea>
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<p style="text-align: center;"><input type="submit" name="submit" value="OK"></p>
		</td>
	</tr>
	</form>
</table>

<?php include("bottom.php"); ?>