<?php
$referer = $_SERVER['HTTP_REFERER'] ?? '';

// Se il percorso non è views/home.php fa redirect
if (strpos($referer, 'views/home.php') === false) {
	sleep(1);
	header("Location: ../views/home.php");
	exit();
}

exit();
