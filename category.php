<?php include("header.php"); ?>

<h2>Catégorie</h2>

<?php

$id = $_GET['category'];
$resultat_cat = mysqli_query($con, "SELECT * FROM category WHERE id=$id ORDER BY id");
$donne = mysqli_fetch_assoc($resultat_cat);
echo "<p class='italic' style='text-align: justify;''>" . stripslashes($donne["description"]) . "</p>";


$regex = "(^$id)|(,$id,)|(,$id$)";
$resultat = mysqli_query($con, "SELECT * FROM item WHERE category_id REGEXP '$regex' ORDER BY id");
if (mysqli_num_rows($resultat) == 0)
	echo "Il n'y a aucun article dans cette catégorie.";
else
{
	while ($donne = mysqli_fetch_assoc($resultat))
		echo "- <a href='item.php?item=" .$donne['id']. "'>" . stripslashes($donne['name']) . "</a> - Prix : " . $donne['price'] . "$<br />";
	mysqli_free_result($resultat);
}

?>

<?php include("bottom.php"); ?>