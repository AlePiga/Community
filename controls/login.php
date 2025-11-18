<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../model/Database.php';
$database = new Database();

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

$query = "SELECT * FROM utenti WHERE Username = '$username'";
$result = $database->query($query);

if ($result->num_rows === 1) {
	$utente = $result->fetch_assoc();
	if (password_verify($password, $utente['Password'])) {
		$_SESSION['username'] = $username;
		header("Location: ../views/home.php");
		exit();
	}
}

header("Location: ../views/errorelogin_view.php");
exit();
