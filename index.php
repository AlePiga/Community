<?php
session_start(); // 👈 Deve essere sempre la primissima istruzione

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
        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();

            $_SESSION['username'] = $user['Username'];

            header("Location: ./view/home.php");
            exit();
        }
    } else {
        $messaggio = 'Username o password errati.';
    }
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login / Collezione CD</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="select-none bg-gray-50 text-gray-800 antialiased">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">
                <?php if ($messaggio): ?>
                    <div class="mb-4 rounded-md bg-red-50 border border-red-200 px-4 py-3 text-sm text-red-700">
                        <?= htmlspecialchars($messaggio) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="" class="space-y-4">
                    <label class="block">
                        <span class="text-sm font-medium text-gray-700">Username</span>
                        <input
                            type="text"
                            name="username"
                            placeholder="username"
                            value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : 'AlePiga' ?>"
                            required
                            autofocus
                            class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition" />
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-gray-700">Password</span>
                        <input
                            type="password"
                            name="password"
                            placeholder="password"
                            value="<?= isset($_POST['password']) ? htmlspecialchars($_POST['password']) : 'alphastep' ?>"
                            required
                            class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition" />
                    </label>

                    <button
                        type="submit"
                        class="w-full mt-2 inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-4 py-2 shadow hover:brightness-105 active:scale-99 transition">
                        Accedi
                    </button>
                </form>
            </div>

            <p class="text-center text-sm text-gray-500 mt-4">
                Non hai un account?
                <a onclick="alert('Devo ancora implementarlo!! =)')" class="text-indigo-600 hover:underline">Registrati</a>
            </p>
        </div>
    </div>
</body>

</html>