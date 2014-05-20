<?php include("header.php"); ?>

<h2>Modification du mot de passe</h2>
<table class="login">
	<form action="modif.php" method="POST">
		<?php
		session_start();
		if (!$_SESSION['loggued_on_user'])
		{ ?>
		<tr>
			<td>
				Identifiant:
			</td>
			<td>
				<input style="width: 95%;" type="text" name="login"><?php } ?>
			</td>
		</tr>
		<tr>
			<td>
				Ancien mot de passe:
			</td>
			<td>
				<input style="width: 95%;" type="password" name="oldpw">
			</td>
		</tr>
		<tr>
			<td>
				Nouveau mot de passe:
			</td>
			<td>
				<input style="width: 95%;" type="password" name="newpw">
			</td>
		</tr>
			<td colspan=2>
				<p style="text-align: center;"><input type="submit" name="submit" value="OK"></p>
			</td>
		</tr>
	</form>
</table>

<?php include("bottom.php"); ?>
