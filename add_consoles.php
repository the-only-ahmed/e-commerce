<?php

$category = 2;
$xbox_O = "video game console released by Microsoft in 2013";
$xbox_360 = "video game console released by Microsoft in 2005";
$xbox_1 = "video game console released by Microsoft in 2001";
$ps_4 = "video game console released by Sony in 2013";
$ps_3 = "video game console released by Sony in 2006";
$ps_2 = "video game console released by Sony in 2000";
$ps_1 = "video game console released by Sony in 1994";
$psp = "video game console released by Sony in 2004";
$psv = "video game console released by Sony in 2011";
$wii = "video game console released by Nintendo in 2006";
$wii_U = "video game console released by Nintendo in 2012";
$ds = "video game console released by Nintendo in 2011";
$atari = "video game console released by Atari in 1977";

$tab = array("Xbox One" => $xbox_O, "Xbox 360" => $xbox_360, "Xbox" => $xbox_1, "PS 4" => $ps_4, "PS 3" => $ps_3, "PS 2" => $ps_2, "PS 1" => $ps_1, "PSP" => $psp, "PS Vita" => $psv, "Nintendo Wii" => $wii, "Nintendo Wii U" => $wii_U, "Nintendo 3ds" => $ds, "Atari 2600" => $atari);

$xbox_O = "http://www.journaldugeek.com/files/2014/01/1282415-xbox-one1.jpg";
$xbox_360 = "http://cdn-static.gamekult.com/gamekult-com/images/photos/30/50/15/14/e3-2013-nouvelle-xbox-360-precisions-sur-les-packs-ME3050151407_2.jpg";
$xbox_1 = "http://www.zone-numerique.com/wp-content/uploads/2013/07/xbox1-18115468.jpg";
$ps_4 = "http://todops4.com/wp-content/uploads/2013/10/1109.jpg";
$ps_3 = "http://www.dvd-ppt-slideshow.com/images/powerpoint-knowledge/view-ppt-on-ps3-playstation3.jpg";
$ps_2 = "http://www.journaldugamer.com/files/2008/10/playstation-2.jpg";
$ps_1 = "http://cdn.fromheroestoicons.com/blog/wordpress/wp-content/uploads/2013/02/ps1.jpg";
$psp = "http://i.pcworld.fr/1194325-psp.png";
$psv = "http://www.tuxboard.com/photos/2012/03/PS-Vita.jpg";
$wii = "http://i.pcworld.fr/1287533-wii.jpg";
$wii_U = "http://www.journaldugamer.com/files/2013/10/wii-u-maj.jpg";
$ds = "http://img1.lesnumeriques.com/test/70/7037/Nintendo_3DS-XL_3DS_Officiel.jpg";
$atari = "http://upload.wikimedia.org/wikipedia/en/0/02/Atari-2600-Wood-4Sw-Set.png";

$img = array($xbox_O, $xbox_360, $xbox_1, $ps_4, $ps_3, $ps_2, $ps_1, $psp, $psv, $wii, $wii_U, $ds, $atari);
$price = array(499.99, 199.95, 40.50, 399.99, 39.90, 182.62, 8.70, 99.99, 129.00, 43.99, 289.90, 180.95, 3.85);

$i = 0;
foreach ($tab as $name => $desc)
{
	if ($price[$i] < 40.00)
		$category = "2,5";
	$req_pre = mysqli_prepare($con, 'INSERT INTO item (category_id, name, img, description, price) VALUES (?, ?, ?, ?, ?)');
	mysqli_stmt_bind_param($req_pre, 'ssssd', $category, $name, $img[$i], $desc, $price[$i]);
	mysqli_stmt_execute($req_pre);
	$category = 2;
	$i++;
}
?>
