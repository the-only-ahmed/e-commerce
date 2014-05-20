<?php include("header.php"); ?>

<h2>Inscription</h2>
<table class="login">
	<form action="create.php" method="POST">
		<tr>
			<td>
				Identifiant:
			</td>
			<td>
				<input style="width: 95%;" type="text" name="login"><br />
			</td>
		</tr>
		<tr>
			<td>
				Mot de passe:
			</td>
			<td>
				<input style="width: 95%;" type="password" name="passwd"><br />
			</td>
		<tr>
		<tr>
			<td colspan=2>
				<p style="text-align: center;"><input type="submit" name="submit" value="OK"></p>
			</td>
		</tr>
	</form>
</table>

<?php include("bottom.php"); ?>