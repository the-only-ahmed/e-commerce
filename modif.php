<?php include("header.php"); ?>
<?php

function verif_log()
{
	if ($_POST['login'] == NULL || $_POST['oldpw'] == NULL || $_POST['newpw'] == NULL)
	{
		echo"Erreur : Login ou identifiant vide.\n";
		return -1;
	}
	return 1;
}

session_start();
if ($_SESSION['loggued_on_user'])
	$_POST['login'] = $_SESSION['loggued_on_user'];

if (verif_log() == -1)
	return ;

$log = $_POST['login'];
$old_pass = $_POST['oldpw'];
$pass = $_POST['newpw'];

$pass_hash = hash("whirlpool", $pass);
$old_hash = hash("whirlpool", $old_pass);


$resultat = mysqli_query($con, "SELECT * FROM user WHERE login='$log' ORDER BY id");
$donne = mysqli_fetch_assoc($resultat);
if (mysqli_num_rows($resultat)  == 0) // si login existe dans table
{
	echo "Erreur : Login inexistant.\n"; // login existant
	return ;
}

if ($old_hash != $donne["password"])
{
	echo "Fail password.\n"; // login existant
	return ;
}

$req_pre = mysqli_prepare($con, "UPDATE user SET password=? WHERE login='$log'");
mysqli_stmt_bind_param($req_pre, 's', $pass_hash);
mysqli_stmt_execute($req_pre);

header("Location: index.php");

?>
<?php include("bottom.php"); ?>
