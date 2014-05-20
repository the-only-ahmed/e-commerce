<?php include("header.php"); ?>

<?php

$id = $_GET["category"];

$req_pre = mysqli_prepare($con, "DELETE FROM category WHERE id=?");
mysqli_stmt_bind_param($req_pre, 'i', $id);
mysqli_stmt_execute($req_pre);

echo "La catégorie a bien été supprimée.<br />";

?>

<?php include("bottom.php"); ?>