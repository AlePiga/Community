<?php
session_start();
require '../model/Database.php';
$database = new Database();

$username = trim($_POST["username"]);
$password = $_POST["password"];
$password_confirm = $_POST["password_confirm"];

if ($password !== $password_confirm) {
	header("Location: ../views/errors/login/errorepassword_view.php");
	exit();
}

$result = $database->query("SELECT * FROM `utenti` WHERE `Username` = '$username'");

if ($result->num_rows > 0) {
	header("Location: ../views/errors/login/erroregiapresente.php");
	exit();
}

$password_hash = password_hash($password, PASSWORD_DEFAULT);
$database->query("INSERT INTO utenti (Username, Password) VALUES ('$username', '$password_hash')");
sleep(1);
header("Location: ../index.php");
exit();
