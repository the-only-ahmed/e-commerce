<?php include("header.php"); ?>

<h2>Ajouter un utilisateur</h2>

<table class="login">
	<form action="add_user_post.php" method="POST">
	<tr>
		<td>
			Login :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="login">
		</td>
	</tr>
	<tr>
		<td>
			Password :
		</td>
		<td>
			<input style="width: 95%;" type="password" name="password">
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