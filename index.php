<?php
// Per forzare stampa errori su Lampp
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'model/Database.php';

$database = new Database();
$messaggio = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $query = "SELECT * FROM utenti WHERE Username = '$username' AND Password = '$password'";
    $result = $database->query($query);

    if ($result && $result->num_rows === 1) {
        header("Location: ./view/home.php");
        exit();
    } else {
        $messaggio = '<span style="color:red;">Username o password errati.</span>';
    }
}
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <title>Login</title>
</head>

<body>
    <h2>Login</h2>
    <?php if ($messaggio): ?>
        <div><?php echo $messaggio; ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="username" value="AlePiga" required autofocus>
        <input type="password" name="password" placeholder="password" value="alphastep" required>
        <button type="submit">Accedi</button>
    </form>
</body>

</html>