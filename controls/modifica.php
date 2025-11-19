<?php
session_start();
require '../model/Database.php';
$database = new Database();

$id = htmlspecialchars($_POST["id"]);
$album = htmlspecialchars($_POST["album"]);
$interprete = htmlspecialchars($_POST["interprete"]);
$anno = htmlspecialchars($_POST["anno"]);
$paese = htmlspecialchars($_POST["paese"]);
$rating = htmlspecialchars($_POST["rating"]);

$database->query(" UPDATE `cds` SET `Album` = '$album', `Interprete` = '$interprete', `Anno` = '$anno', `Paese` = '$paese', `Rating` = '$rating' WHERE `ID` = '$id'");

sleep(1);
header("Location: ../views/home.php");
exit();
