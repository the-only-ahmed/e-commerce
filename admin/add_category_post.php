<?php include("header.php"); ?>

<?php
function verif_log()
{
	if ($_POST['name'] == NULL || $_POST['description'] == NULL)
	{
		echo "Erreur : Tous les champs doivent être remplis.\n";
		return -1;
	}
	return 1;
}

if (verif_log() == -1)
	return ;


$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);



$resultat = mysqli_query($con, "SELECT * FROM category WHERE name='$name' ORDER BY id");

if (mysqli_num_rows($resultat)  != 0)
{
	echo "Erreur : Une catégorie portant ce nom existe déjà.\n";
	return ;
}



// insertion dans BDD
$req_pre = mysqli_prepare($con, 'INSERT INTO category (name, description) VALUES (?, ?)');
mysqli_stmt_bind_param($req_pre, 'ss', $name, $description);
mysqli_stmt_execute($req_pre);

echo "La catégorie " . stripslashes($name) . " a été créée avec succès.<br />";
?>

<?php include("bottom.php"); ?>