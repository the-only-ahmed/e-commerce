<?php include("header.php"); ?>

<?php

$id = $_GET["user"];

$req_pre = mysqli_prepare($con, "DELETE FROM user WHERE id=?");
mysqli_stmt_bind_param($req_pre, 'i', $id);
mysqli_stmt_execute($req_pre);

echo "L'utilisateur a bien été supprimé.<br />";

?>

<?php include("bottom.php"); ?>
