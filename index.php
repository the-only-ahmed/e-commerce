<?php include("header.php"); ?>

<h2>Bienvenue !</h2>
<p>Voici le minishop de 42. Ici vous pourrez acheter toutes sortes de produits.</p>
<h2>Catégories</h2>
<p>Retrouvez ici la liste des catégories du magasin. Cliquez sur une catégorie pour voir les objets qu'elle contient.</p>
<?php
$resultat = mysqli_query($con, "SELECT * FROM category ORDER BY id");
if (mysqli_num_rows($resultat) == 0)
	echo "<p class='italic'>Il n'y a actuellement aucune catégorie sur le site.</p>";
else
{
	while ($donne = mysqli_fetch_assoc($resultat))
		echo  "<h3><a href='category.php?category=" . $donne["id"] . "'>" . stripslashes($donne['name']) . "</a></h3><p style='text-align:justify'><i>" . $donne['description'] . "</i></p><br />";
	mysqli_free_result($resultat);
}
?>

<h2>Articles</h2>
<p>Retrouvez ici la liste des articles du magasin. Cliquez sur un article pour voir les informations le conçernant.</p>

<?php
$resultat = mysqli_query($con, "SELECT * FROM item ORDER BY id");
if (mysqli_num_rows($resultat) == 0)
	echo "<p class='italic'>Il n'y a actuellement aucun article sur le site.</p>";
else
{
	while ($donne = mysqli_fetch_assoc($resultat))
		echo "- <a href='item.php?item=" .$donne['id']. "'>" . stripslashes($donne['name']) . "</a> - Prix : " . $donne['price'] . "$<br />";
	mysqli_free_result($resultat);
}
?>

<?php include("bottom.php"); ?>