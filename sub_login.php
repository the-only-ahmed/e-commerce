<?php include("header.php"); ?>

<h2>Connection</h2>

<form action="login.php" method="POST">
<table class="login">
	<tr>
		<td>
			Identifiant:
		</td>
		<td>
			<input style="width: 95%;" type="text" name="login">
		</td>
	</tr>
	<tr>
		<td>
			Mot de passe:
		</td>
		<td>
			<input style="width: 95%;" type="password" name="passwd">
		</td>
	</tr>
	<tr>
		<td colspan=2>
			<p style="text-align: center;"><input type="submit" name="submit" value="OK"><br />
			<span style="font-size: 0.5em"><a href="subscription.php">Creer un compte</a><br />
			<a href="modif_user.php">Changer de mot de passe</a></span></p>
		</td>
	</tr>
</table>
</form>

<?php include("bottom.php"); ?>