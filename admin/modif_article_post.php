<?php include("header.php"); ?>

<?php
function verif_log()
{
	if ($_POST['name'] == NULL || $_POST['category'] == NULL || $_POST['img'] == NULL || $_POST['description'] == NULL || $_POST['price'] == NULL)
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
$category = $_POST['category'];
$img = addslashes($_POST['img']);
$description = addslashes($_POST['description']);
$price = $_POST['price'];


// insertion dans BDD
$req_pre1 = mysqli_prepare($con, "UPDATE item SET name=? WHERE id=?");
$req_pre2 = mysqli_prepare($con, "UPDATE item SET category_id=? WHERE id=?");
$req_pre3 = mysqli_prepare($con, "UPDATE item SET img=? WHERE id=?");
$req_pre4 = mysqli_prepare($con, "UPDATE item SET description=? WHERE id=?");
$req_pre5 = mysqli_prepare($con, "UPDATE item SET price=? WHERE id=?");
mysqli_stmt_bind_param($req_pre1, 'si', $name, $id);
mysqli_stmt_bind_param($req_pre2, 'si', $category, $id);
mysqli_stmt_bind_param($req_pre3, 'si', $img, $id);
mysqli_stmt_bind_param($req_pre4, 'si', $description, $id);
mysqli_stmt_bind_param($req_pre5, 'di', $price, $id);
mysqli_stmt_execute($req_pre1);
mysqli_stmt_execute($req_pre2);
mysqli_stmt_execute($req_pre3);
mysqli_stmt_execute($req_pre4);
mysqli_stmt_execute($req_pre5);

echo "L'article " . stripslashes($name) . " a été modifié avec succès.<br />";
?>

<?php include("bottom.php"); ?>