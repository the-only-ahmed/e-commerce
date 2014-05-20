<?php

if (!file_exists(".log.txt"))
	echo "ERROR\n";
else
{
	$tab = file_get_contents(".log.txt");
	$tab = unserialize($tab);
	$con = mysqli_connect("rush.local.42.fr", $tab[0], $tab[1], "minishop");
	
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error() . "\n";
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ft_Minishop</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<meta charset="UTF-8" />
		<meta lang="fr" />
	</head>
	<body>
		<table class="mainbloc">
			<tr class="head_barre">
				<td>
					<h1>ft_Minishop</h1>
					<p style="text-align: center; margin-top: -20px; color: #FFFFFF;">
					<a href="index.php" class="head_barre">Accueil</a> - <a href="panier.php" class="head_barre">Panier</a> - <?php
						session_start();
						if ($_SESSION['loggued_on_user'])
						{
						?>
						<a href="logout.php" class="head_barre">Déconnection</a></p>
						<?php } else {?>
						<a href="sub_login.php" class="head_barre">Connection</a> - <a href="subscription.php" class="head_barre">Inscription</a></p><?php }?>
					</td>
				</tr>
				<tr>
					<td class="main_barre">
