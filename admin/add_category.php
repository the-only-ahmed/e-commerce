<?php include("header.php"); ?>

<h2>Ajouter une catégorie</h2>
<table class="login">
	<form action="add_category_post.php" method="POST">
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
			Description :
		</td>
		<td>
			<textarea style="width: 95%;" type="textfield" name="description"></textarea>
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