<?php include("header.php"); ?>
<?php

session_start();

$login = $_POST['login'];
$pass = $_POST['passwd'];

function verif_log($login, $passwd)
{
	if ($login == NULL || $passwd == NULL)
	{
		echo "Erreur : Login ou mot de passe vide.\n";
		return -1;
	}
	return 1;
}

if (verif_log($login, $pass) == -1)
{
	$_SESSION['loggued_on_user'] = NULL;
	return FALSE;
}
$log = $login;

$pass_hash = hash("whirlpool", $pass);

$resultat = mysqli_query($con, "SELECT * FROM user WHERE login='$log' ORDER BY id");
$donne = mysqli_fetch_assoc($resultat);

if (($donne["login"] == $log) && ($donne["password"] == $pass_hash))
{
	echo "Connecté avec succès.";
	$_SESSION['loggued_on_user'] = $login;
	if ($donne["power"] == 99)
		$_SESSION['power'] = "99";
	$temp = $donne['id'];
	//$resultat2 = mysqli_query($con, "SELECT * FROM item_save WHERE user_id='$temp' ORDER BY id");
	//while ($donne2 = mysqli_fetch_assoc($resultat2))
	//	$tab[] = $donne2["item_id"];
	//$_SESSION['panier'] = serialize($tab);
	header ("Location: index.php");
	return TRUE;
}
echo "Mot de passe ou identifiant éronné.";
$_SESSION['loggued_on_user'] = NULL;
return FALSE;

?>
<?php include("bottom.php"); ?>
