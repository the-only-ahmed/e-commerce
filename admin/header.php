<?php

if (!file_exists("../.log.txt"))
	echo "ERROR\n";
else
{
	$tab = file_get_contents("../.log.txt");
	$tab = unserialize($tab);
	$con = mysqli_connect("rush.local.42.fr", $tab[0], $tab[1], "minishop");
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error() . "\n";

	session_start();
	if ($_SESSION['power'] != "99") // Securité
		header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>ft_Minishop</title>
		<link rel="stylesheet" type="text/css" href="../style.css" />
		<meta charset="UTF-8" />
		<meta lang="fr" />
	</head>
	<body>
		<table class="mainbloc">
			<tr class="head_barre">
				<td>
					<h1>ft_Minishop - Administration</h1>
					<p style="text-align: center; margin-top: -20px; color: #FFFFFF;">
					<a href="item.php" class="head_barre">Articles</a> - <a href="category.php" class="head_barre">Catégorie</a> - <a href="user.php" class="head_barre">Utilisateurs</a> - <a href="archive.php" class="head_barre">Commandes archivés</a></p>
				</td>
			</tr>
			<tr>
					<td class="main_barre">