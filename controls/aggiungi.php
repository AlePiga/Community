<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
require '../model/Database.php';
$database = new Database();

$album = htmlspecialchars($_POST["album"]);
$interprete = htmlspecialchars($_POST["interprete"]);
$anno = htmlspecialchars($_POST["anno"]);
$paese = htmlspecialchars($_POST["paese"]);
$rating = htmlspecialchars($_POST["rating"]);

$result = $database->query("SELECT * FROM `cds` WHERE `Album` = '$album' AND `Interprete` = '$interprete' AND `Anno` = '$anno'");

if ($result->num_rows > 0) {
	header("Location: ../views/errors/crud/erroregiapresente.php");
	exit();
} else {
	$database->query("INSERT INTO cds (Album, Interprete, Anno, Paese, Rating) VALUES ('$album', '$interprete', '$anno', '$paese', '$rating')");

	sleep(1);
	header("Location: ../views/home.php");
	exit();
}
