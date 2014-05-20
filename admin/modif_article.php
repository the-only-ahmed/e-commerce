<?php include("header.php"); ?>

<?php
session_start();
$id = $_GET["item"];
$_SESSION["id"] = $id;
$resultat = mysqli_query($con, "SELECT * FROM item WHERE id=$id ORDER BY id");
$donne = mysqli_fetch_assoc($resultat);
?>

<h2>Modifier un article</h2>
<table class="login" style="width: 40%;">
	<form action="modif_article_post.php" method="POST">
	<tr>
		<td>
			Nom :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="name" value="<?php echo stripslashes($donne['name']) ?>"
		</td>
	</tr>
	<tr>
		<td>
			Id des catégories (séparés par des virgules) :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="category" value="<?php echo $donne['category_id'] ?>">
		</td>
	</tr>
	<tr>
		<td>
			Lien de l'image :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="img" value="<?php echo stripslashes($donne['img']) ?>">
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
		<td>
			Prix :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="price" value="<?php echo $donne['price'] ?>">
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