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
	<div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
		<a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
			<img src="../res/CDSpin.gif" class="h-10" alt="Flowbite Logo" />
			<span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">Collezione CD</span>
		</a>
		<button data-collapse-toggle="navbar-solid-bg" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-solid-bg" aria-expanded="false">
			<svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
			</svg>
		</button>
		<div class="hidden w-full md:block md:w-auto" id="navbar-solid-bg">
			<ul class="flex flex-col mt-4 rounded-lg bg-gray-50 md:flex-row md:items-center md:justify-end md:mt-0 md:space-x-6 md:border-0 md:bg-transparent dark:bg-gray-800 md:dark:bg-transparent dark:border-gray-700">
				<li>
					<div class="flex items-center space-x-4">
						<p class="text-white text-medium">
							<?php
							if (isset($_SESSION['username'])) {
								echo "Benvenuto, " . htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8') . "!";
							}
							?>
						</p>
						<button onclick="apriModaleAggiungi()"
							class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-6 py-2 rounded-lg transition hover:opacity-90">
							Aggiungi CD
						</button>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>