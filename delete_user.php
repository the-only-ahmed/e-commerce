<?php include("header.php"); ?>
	<form action="delete.php" method="POST">
	<?php
		session_start();
		if (!$_SESSION['loggued_on_user'])
		{ ?>
		Identifiant: <input type="text" name="login"><br /><?php } ?>
		Mot de passe: <input type="password" name="oldpw"><br />
		Retapez le mot de passe: <input type="password" name="newpw"><br />
		<input type="submit" name="submit" value="OK">
<?php include("bottom.php"); ?>
