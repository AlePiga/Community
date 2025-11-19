<?php
session_start();
require '../model/Database.php';
$database = new Database();

$id = htmlspecialchars($_POST["idElimina"]);
$database->query("DELETE FROM `cds` WHERE `ID` = '$id'");

sleep(1);

header("Location: ../views/home.php");
exit();
