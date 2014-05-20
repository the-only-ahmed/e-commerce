<?php include("header.php"); ?>

<h2>Ajouter un article</h2>

<table class="login" style="width: 40%;">
	<form action="add_article_post.php" method="POST">
	<tr>
		<td>
			Nom :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="name">
		</td>
	</tr>
	<tr>
		<td>
			Id des catégories (séparés par des virgules) :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="category">
		</td>
	</tr>
	<tr>
		<td>
			Lien de l'image :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="img">
		</td>
	</tr>
	<tr>
		<td>
			Description :
		</td>
		<td>
			<textarea style="width: 95%;" type="textfield" name="description"></textarea>
		</td>
	</tr>
	<tr>
		<td>
			Prix :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="price">
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