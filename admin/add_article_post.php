<?php include("header.php"); ?>

<?php
function verif_log()
{
	if ($_POST['name'] == NULL || $_POST['category'] == NULL || $_POST['img'] == NULL || $_POST['description'] == NULL || $_POST['price'] == NULL)
	{
		echo "Erreur : Tous les champs doivent être remplis.\n";
		return -1;
	}
	return 1;
}

if (verif_log() == -1)
	return ;


$name = addslashes($_POST['name']);
$category = $_POST['category'];
$img = addslashes($_POST['img']);
$description = addslashes($_POST['description']);
$price = $_POST['price'];



$resultat = mysqli_query($con, "SELECT * FROM item WHERE name='$name' ORDER BY id");

if (mysqli_num_rows($resultat)  != 0)
{
	echo "Erreur : Un article portant ce nom existe déjà.\n";
	return ;
}



// insertion dans BDD
$req_pre = mysqli_prepare($con, 'INSERT INTO item (category_id, name, img, description, price) VALUES (?, ?, ?, ?, ?)');
mysqli_stmt_bind_param($req_pre, 'ssssd', $category, $name, $img, $description, $price);
mysqli_stmt_execute($req_pre);

echo "L'article " . stripslashes($name) . " a été créé avec succès.<br />";
?>

<?php include("bottom.php"); ?>