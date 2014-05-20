<?php include("header.php"); ?>

<?php
function verif_log()
{
	if ($_POST['login'] == NULL || $_POST['password'] == NULL)
	{
		echo "Erreur : Aucun des champs ne peut être vide.\n";
		return -1;
	}
	return 1;
}

if (verif_log() == -1)
	return ;

session_start();
$id = $_SESSION["id"];
$_SESSION["id"] = NULL;
$login = addslashes($_POST['login']);
$pass = hash("whirlpool", $_POST['password']);


// insertion dans BDD
$req_pre1 = mysqli_prepare($con, "UPDATE user SET login=? WHERE id=?");
$req_pre2 = mysqli_prepare($con, "UPDATE user SET password=? WHERE id=?");
mysqli_stmt_bind_param($req_pre1, 'si', $login, $id);
mysqli_stmt_bind_param($req_pre2, 'si', $pass, $id);
mysqli_stmt_execute($req_pre1);
mysqli_stmt_execute($req_pre2);

echo "L'utilisateur " . stripslashes($login) . " a été modifié avec succès.<br />";
?>

<?php include("bottom.php"); ?>