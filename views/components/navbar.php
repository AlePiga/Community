<?php
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}

$nome = '';
if (isset($nome_utente) && $nome_utente !== '') {
	$nome = $nome_utente;
} elseif (!empty($_SESSION['nome_utente'])) {
	$nome = $_SESSION['nome_utente'];
}

$nome = htmlspecialchars($nome);
?>

<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
	<div class="max-w-screen-xl mx-auto p-4 flex items-center justify-between">
		<a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
			<img src="../assets/CDSpin.gif" class="h-10" alt="Flowbite Logo" />
			<span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">
				Collezione CD
			</span>
		</a>
		<ul class="flex items-center space-x-6 bg-transparent">
			<li>
				<div class="flex items-center space-x-4">
					<p class="text-white text-medium">
						<?php
						if (isset($_SESSION['username'])) {
							echo "Benvenuto, " . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . "!";
						}
						?>
					</p>
					<button onclick="apriModalAggiungi()"
						class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-6 py-2 rounded-lg transition hover:opacity-90">
						Aggiungi CD
					</button>
				</div>
			</li>
		</ul>
	</div>
</nav>