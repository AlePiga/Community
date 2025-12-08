<?php
session_start();
$pagina = basename($_SERVER['PHP_SELF']);
?>

<nav class="border-gray-200 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
	<div class="max-w-screen-xl mx-auto p-4 flex items-center justify-between">
		<a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
			<img src="../assets/CDSpin.gif" class="h-10" alt="CD spinning GIF" />
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
							echo "Benvenuto, " . htmlspecialchars($_SESSION['username']) . "!";
						}
						?>
					</p>

					<?php if ($pagina === 'home.php'): ?>
						<a onclick="apriModalAggiungi()"
							class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-6 py-2 rounded-lg transition hover:opacity-90">
							Aggiungi CD
						</a>
					<?php else: ?>
						<a href="home.php"
							class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-6 py-2 rounded-lg transition hover:opacity-90">
							Torna alla Home
						</a>
					<?php endif; ?>
					<?php if ($pagina === 'home.php'): ?>

						<a href="../controls/crediti.php"
							class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-6 py-2 rounded-lg transition hover:opacity-90">
							Crediti
						</a>
					<?php endif; ?>

					<a href="../controls/logout.php"
						class="bg-gradient-to-r from-red-600 to-red-500 text-white font-medium px-6 py-2 rounded-lg transition hover:opacity-90">
						Esci
					</a>
				</div>
			</li>
		</ul>
	</div>
</nav>