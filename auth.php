<?php

function verif_log($login, $passwd)
{
	if ($login == NULL || $passwd == NULL)
	{
		echo "Erreur : Login ou identifiant vide.\n";
		return -1;
	}
	return 1;
}

function auth($login, $passwd)
{
	if (verif_log($login, $passwd) == -1)
		return FALSE;
	$log = $login;
	$pass = $passwd;

	$pass_hash = hash("whirlpool", $pass);

	$resultat = mysqli_query($con, "SELECT * FROM user WHERE login='$log' ORDER BY id");
	echo mysqli_num_rows($resultat);
	$donne = mysqli_fetch_assoc($resultat);

	echo $donne["login"] . "a<br />";
	echo $log . "b<br />";
	echo $donne["password"] . "c<br />";
	echo $pass_hash . "d<br />";

	if (($donne["login"] == $log) && ($donne["password"] == $pass_hash))
	{
		echo "connecte";
		return TRUE;
	}
	echo "rate";
	return FALSE;
}
?>
