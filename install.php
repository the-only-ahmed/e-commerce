#!/usr/bin/php
<?php

$usr = $_SERVER['PHP_AUTH_USER'];
$pass =  $_SERVER['PHP_AUTH_PW'];

header("HTTP/1.0 401 Unauthorized");
if (!isset($usr))
{
	header('WWW-Authenticate: Basic realm=""');
	exit;
}

//Create database

	$con = mysqli_connect("rush0.local.42.fr", $usr, $pass);
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error() . "\n";

	// Define database
	$sql = "CREATE DATABASE minishop";
	if (mysqli_query($con, $sql))
		echo "Database minishop created successfully\n";
	else
		echo "Error creating database: " . mysqli_error($con) . "\n";

	mysqli_close($con);

//Create tables
	$con = mysqli_connect("rush0.local.42.fr", $usr, $pass, "minishop");
	if (mysqli_connect_errno())
		echo "Failed to connect to MySQL: " . mysqli_connect_error() . "\n";

	// Define table
	$sql1 = "CREATE TABLE user(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, login CHAR(30), password CHAR(128), power INT)";
	$sql2 = "CREATE TABLE item(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, category_id TEXT, name CHAR(30), img TEXT, description TEXT, price DECIMAL(11,2))";
	$sql3 = "CREATE TABLE category(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, name CHAR(30), description TEXT)";
	$sql4 = "CREATE TABLE item_save(id INT PRIMARY KEY NOT NULL AUTO_INCREMENT, user_id INT, item_id INT, nb INT)";

	// Execute query
	$bol = 1;
	if (mysqli_query($con, $sql1))
		echo "Table user created successfully\n";
	else
	{
		$bol = 0;
		echo "Error creating table: " . mysqli_error($con) . "\n";
	}
	// Execute query
	if (mysqli_query($con, $sql2))
		echo "Table item created successfully\n";
	else
	{
		$bol = 0;
		echo "Error creating table: " . mysqli_error($con) . "\n";
	}
	// Execute query
	if (mysqli_query($con, $sql3))
		echo "Table category created successfully\n";
	else
	{
		$bol = 0;
		echo "Error creating table: " . mysqli_error($con) . "\n";
	}
	// Execute query
	if (mysqli_query($con, $sql4))
		echo "Table item_save created successfully\n";
	else
	{
		$bol = 0;
		echo "Error creating table: " . mysqli_error($con) . "\n";
	}

	if ($bol)
		include("base.php");

	mysqli_close($con);

	$tab = array($usr, $pass);
	$tab = serialize($tab);
	file_put_contents(".log.txt", $tab);
?>
