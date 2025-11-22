<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Login / Collezione CD</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" type="image/x-icon" href="./assets/CDSpin.gif">
</head>

<body class="select-none bg-gray-50 text-gray-800 antialiased">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="max-w-md w-full">
            <div class="bg-white rounded-2xl shadow-lg p-6 sm:p-8">
                <h2 class="mb-3 text-3xl font-bold text-center">Login</h2>
                <form method="POST" action="controls/login.php" class="space-y-4">
                    <label class="block">
                        <span class="text-sm font-medium text-gray-700">Username</span>
                        <input
                            type="text"
                            name="username"
                            placeholder="Inserisci l'username"
                            required
                            autofocus
                            class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition" />
                    </label>

                    <label class="block">
                        <span class="text-sm font-medium text-gray-700">Password</span>
                        <input
                            type="password"
                            name="password"
                            placeholder="••••••••••••••"
                            required
                            class="mt-2 w-full px-4 py-2 rounded-lg border border-gray-200 bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400 transition" />
                    </label>

                    <button
                        type="submit"
                        class="w-full mt-2 inline-flex items-center justify-center gap-2 rounded-xl bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-4 py-2 shadow hover:brightness-105 active:scale-99 transition">
                        Avanti
                    </button>
                </form>
            </div>

            <p class="text-center text-sm text-gray-500 mt-4">
                Non hai un account?
                <a href="./views/registrati_view.php" class="text-indigo-600 hover:underline">Registrati</a>
            </p>
        </div>
    </div>
</body>

</html>