<?php

$pass_hash = hash("whirlpool", "admin");
$power = 99;
$login = "admin";
$req_pre = mysqli_prepare($con, 'INSERT INTO user (login, password, power) VALUES (?, ?, ?)');
mysqli_stmt_bind_param($req_pre, 'ssi', $login, $pass_hash, $power);
mysqli_stmt_execute($req_pre);

$gun = "any instrument or device for use in attack or defense in combat, fighting, or war, as a sword, rifle, or cannon.";
$psx = 'device that outputs a video signal to display a video game. The term "video game console" is used to distinguish a machine designed for consumers to use for playing video games on a separate television in contrast to arcade machines, handheld game consoles, or home computers.';
$v_g = "an electronic game that involves human interaction with a user interface to generate visual feedback on a video device.";
$tier = "All genre of animals.";
$little = "Items with low price";

$tab = array("Weapons" => $gun, "Consoles" => $psx, "Jeux-video" => $v_g, "Animaux" => $tier, "pas-cher" => $little);
foreach ($tab as $key => $val)
{
	$req_pre = mysqli_prepare($con, 'INSERT INTO category (name, description) VALUES (?, ?)');
	mysqli_stmt_bind_param($req_pre, 'ss', $key, $val);
	mysqli_stmt_execute($req_pre);
}

include("add_weapons.php");
include("add_consoles.php");
include("add_games.php");
?>
