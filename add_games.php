<?php

$category = 3;
$fifa = "a Soccer video game";
$nba = "a basketball video game";
$cod = "Call of Duty is a first-person shooter video game";
$battle = "Battlefield is a first-person shooter video game";
$forza = "a racing video game";
$nfs = "a racing video game";
$gta = "Grand Theft Auto V is an open world, action-adventure video game";
$creed = "Assassin's Creed IV: Black Flag is a 2013 historical action-adventure open world video game";
$desh = "The game is played from a first-person perspective and allows the player to undertake a series of assassination missions in a variety of ways, with an emphasis on player choice.";
$titanfall = "first-person shooter multiplayer video game";

$tab = array("FIFA 14" => $fifa, "NBA 2k14" => $nba, "Call of Duty Ghosts" => $cod, "Battlefield 4" => $battle, "Forza Motorsport 5" => $forza, "Need For Speed Rivals" => $nfs, "GTA V" => $gta, "Assassin's Creed : Black Flag" => $creed, "Dishonored" => $desh, "Titanfall" => $titanfall);

$fifa = "http://gmbox.ru/sites/default/files/307/fifa-14-gameplay.jpg";
$nba = "http://lightningamer.com/wp-content/uploads/2014/03/NBA_2K14.jpg";
$cod = "http://clickandgeek.com/wp-content/uploads/2013/11/Call-of-Duty-Ghosts-HD.jpg";
$battle = "http://astucedegeek.fr/wp-content/uploads/2013/11/wallpaper_battlefield_4.jpg";
$forza = "http://www.vinyculture.com/wp-content/uploads/2013/11/forza-5-wallpaper-in-hd.jpg";
$nfs = "http://lespassionsdugeek.com/wp-content/uploads/2014/01/Need-For-Speed-Rivals-HD-Picture.jpg";
$gta = "http://www.planete-info.fr/wp-content/uploads/2013/09/GTA-5-1.jpg";
$creed = "http://www.justfocus.fr/wp-content/uploads/2013/12/assassins-creed-4-black-flag.jpg";
$desh = "http://www.nikopik.com/wp-content/uploads/2012/10/dishonored1.jpg";
$titanfall = "http://www.journaldugamer.com/files/2014/02/TitanFall_WallPaper.jpg";

$img = array($fifa, $nba, $cod, $battle, $forza, $nfs, $gta, $creed, $desh, $titanfall);
$price = array(48.80, 42.50, 48.00, 42.66, 69.99, 42.90, 48.90, 40.00, 19.98, 59.90);

$i = 0;
foreach ($tab as $name => $desc)
{
	if ($price[$i] < 40.00)
		$category = "3,5";
	$req_pre = mysqli_prepare($con, 'INSERT INTO item (category_id, name, img, description, price) VALUES (?, ?, ?, ?, ?)');
	mysqli_stmt_bind_param($req_pre, 'ssssd', $category, $name, $img[$i], $desc, $price[$i]);
	mysqli_stmt_execute($req_pre);
	$category = 3;
	$i++;
}
?>
