<?php

$category = 1;
$colt = "The M1911 is a single-action, semi-automatic, magazine-fed, recoil-operated pistol.";
$AK_47 = "The AK-47 is a selective-fire, gas-operated 7.62×39mm assault rifle.";
$Drag = "The Dragunov is a semi-automatic gas-operated rifle with a short-stroke gas-piston system.";
$AK_12 = "The Kalashnikov AK-12 (formerly АK-200) is the newest derivative of the Soviet/Russian AK-47 series of assault rifles.";
$OSV_96 = "is a Russian heavy semi-automatic sniper rifle chambered for the 12.7 x 108 mm round.";
$M18 = "The M18A1 Claymore is a directional anti-personnel mine used by the U.S. military.";
$M26 = "The M26 Modular Accessory Shotgun System (MASS) is a developmental under-barrel shotgun attachment for the M16/M4 family of United States military firearms.";
$M72 = "The M72 LAW (Light Anti-Tank Weapon, also referred to as the Light Anti-Armor Weapon or LAW as well as LAWS Light Anti-Armor Weapons System) is a portable one-shot 66 mm unguided anti-tank weapon.";
$M203 = "The M203 is a single shot 40 mm under-slung grenade launcher designed to attach to a rifle.";
$mach = "is a large cleaver-like knife. The blade is typically 32.5 to 45 centimetres (12.8 to 17.7 in) long and usually under 3 millimetres (0.12 in) thick.";
$neck = 'Schrade Mini Extreme Survival AUTO 2.4" Black Drop Point Combo Blade, Aluminum Handles';
$grenade = "anti-personnel weapon that is designed to disperse small projectiles or fragments on detonation.";

$tab = array("colt 45" => $colt, "AK-47" => $AK_47, "Dragunov sniper rifle" => $Drag, "AK-12" => $AK_12, "OSV-96" => $OSV_96, "M18 Claymore mine" => $M18, "M26/MASS" => $M26, "M72 LAW" => $M72, "M203 grenade launcher" => $M203, "Machete" => $mach, "Neck Knive" => $neck, "Fragmentation grenade" => $grenade);

$Colt = "http://s2.noelshack.com/uploads/images/2298809576052_colt1911.jpg";
$AK_47 = "http://upload.wikimedia.org/wikipedia/commons/5/57/AK-47_type_II_Part_DM-ST-89-01131.jpg";
$Drag = "http://www.armesoccasion.com/wp-content/uploads/Dragunov_SVD.jpg";
$AK_12 = "http://upload.wikimedia.org/wikipedia/commons/1/12/AK-12_Engineering_technologies_international_forum_-_2012_01.jpg";
$OSV_96 = "http://upload.wikimedia.org/wikipedia/commons/b/bd/OSV-96_MAKS-2009.jpg";
$M18 = "http://upload.wikimedia.org/wikipedia/commons/c/c1/US_M18a1_claymore_mine.jpg";
$M26 = "http://upload.wikimedia.org/wikipedia/commons/9/98/PEO_M26_MASS_on_M4_Carbine.jpg";
$M72 = "http://orygie.ru/m72law-1-1.jpg";
$M203 = "http://www.fas.org/man/dod-101/sys/land/M203-1.jpg";
$mach = "http://images.knifecenter.com/thumb/1500x1500/knifecenter/condor/images/CN41715HCnw.jpg";
$neck = "http://images.knifecenter.com/thumb/1500x1500/knifecenter/schrade/images/SCH60MBSAna.jpg";
$grenade = "http://cgmotionbox.com/wp-content/uploads/2011/09/Grenade.png";

$img = array($Colt, $Ak_47, $Drag, $AK_12, $OSV_96, $M18, $M26, $M72, $M203, $mach, $neck, $grenade);
$price = array(319.99, 279.95, 4599.00, 579.87, 5785.69, 719.25, 580.00, 2990.93, 2050.75, 38.99, 29.95, 164.85);

$i = 0;
foreach ($tab as $name => $desc)
{
	if ($price[$i] < 40.00)
		$category = "1,5";
	$req_pre = mysqli_prepare($con, 'INSERT INTO item (category_id, name, img, description, price) VALUES (?, ?, ?, ?, ?)');
	mysqli_stmt_bind_param($req_pre, 'ssssd', $category, $name, $img[$i], $desc, $price[$i]);
	mysqli_stmt_execute($req_pre);
	$category = 1;
	$i++;
}
?>
