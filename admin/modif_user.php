<?php include("header.php"); ?>

<?php
session_start();
$id = $_GET["user"];
$_SESSION["id"] = $id;
$resultat = mysqli_query($con, "SELECT * FROM user WHERE id=$id ORDER BY id");
$donne = mysqli_fetch_assoc($resultat);
?>

<h2>Modifier un utilisateur</h2>
<table class="login">
	<form action="modif_user_post.php" method="POST">
	<tr>
		<td>
			Login :
		</td>
		<td>
			<input style="width: 95%;" type="text" name="login" value="<?php echo stripslashes($donne['login']) ?>">
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