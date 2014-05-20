<?php include("header.php"); ?>

<?php
function verif_log()
{
	if ($_POST['login'] == NULL || $_POST['password'] == NULL)
	{
		echo "Erreur : Tous les champs doivent être remplis.\n";
		return -1;
	}
	return 1;
}

if (verif_log() == -1)
	return ;


$login = addslashes($_POST['login']);
$pass = hash("whirlpool", $_POST['password']);



$resultat = mysqli_query($con, "SELECT * FROM user WHERE login='$login' ORDER BY id");

if (mysqli_num_rows($resultat)  != 0)
{
	echo "Erreur : Un utilisateur portant ce login existe déjà.\n";
	return ;
}



// insertion dans BDD
$req_pre = mysqli_prepare($con, 'INSERT INTO user (login, password) VALUES (?, ?)');
mysqli_stmt_bind_param($req_pre, 'ss', $login, $pass);
mysqli_stmt_execute($req_pre);

echo "L'utilisateur " . stripslashes($login) . " a été créé avec succès.<br />";
?>

<?php include("bottom.php"); ?>