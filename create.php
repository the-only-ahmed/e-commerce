<?php include("header.php"); ?>

<?php
function verif_log()
{
	if ($_POST['login'] == NULL || $_POST['passwd'] == NULL)
	{
		echo"Erreur : Login ou identifiant vide.\n";
		return -1;
	}
	return 1;
}

if (verif_log() == -1)
	return ;


$log = $_POST['login'];
$pass = $_POST['passwd'];
$power = 1;
$pass_hash = hash("whirlpool", $pass);

$resultat = mysqli_query($con, "SELECT * FROM user WHERE login='$log' ORDER BY id");

if (mysqli_num_rows($resultat)  != 0) // si login existe dans table
{
	echo "Erreur : Login déjà existant.\n"; // login existant
	return ;
}



// insertion dans BDD
$req_pre = mysqli_prepare($con, 'INSERT INTO user (login, password, power) VALUES (?, ?, ?)');
mysqli_stmt_bind_param($req_pre, 'ssi', $log, $pass_hash, $power);
mysqli_stmt_execute($req_pre);

echo "Identifiant créé avec succès\n";
?>

<?php include("bottom.php"); ?>
