<?php include("header.php"); ?>

<?php
function verif_log()
{
	if ($_POST['name'] == NULL || $_POST['description'] == NULL)
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
$name = addslashes($_POST['name']);
$description = addslashes($_POST['description']);


// insertion dans BDD
$req_pre1 = mysqli_prepare($con, "UPDATE category SET name=? WHERE id=?");
$req_pre2 = mysqli_prepare($con, "UPDATE category SET description=? WHERE id=?");
mysqli_stmt_bind_param($req_pre1, 'si', $name, $id);
mysqli_stmt_bind_param($req_pre2, 'si', $description, $id);
mysqli_stmt_execute($req_pre1);
mysqli_stmt_execute($req_pre2);

echo "La catégorie " . stripslashes($name) . " a été modifiée avec succès.<br />";
?>

<?php include("bottom.php"); ?>