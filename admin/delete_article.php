<?php include("header.php"); ?>

<?php

$id = $_GET["item"];

$req_pre = mysqli_prepare($con, "DELETE FROM item WHERE id=?");
mysqli_stmt_bind_param($req_pre, 'i', $id);
mysqli_stmt_execute($req_pre);

echo "L'article a bien été supprimé.<br />";

?>

<?php include("bottom.php"); ?>