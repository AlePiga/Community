<head>
	<meta charset="UTF-8" />
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<script src="../script.js"></script>
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<title>Crediti / Collezione CD</title>
	<link rel="icon" type="image/x-icon" href="../assets/CDSpin.gif">
</head>

<body class="select-none bg-gray-50 text-gray-800 antialiased">
	<?php require './components/navbar.php'; ?>

	<div class="max-w-4xl mx-auto p-6">
		<div class="bg-white rounded-xl shadow p-6 space-y-4">
			<p>Ciao! Mi chiamo Alessandro Pigaiani, ho 18 anni e studio Informatica presso l'ITIS "A. Rossi" di Vicenza. Questa pagina nasce come progetto scolastico e riflette una delle mie più grandi passioni: collezionare musica in formato fisico.</p>

			<p>Negli ultimi tre anni ho collezionato decine di CD in diversi negozi in Italia e in Europa, sia per supportare i miei artisti preferiti, sia per avere il pieno controlllo sulla musica che amo. Possiedo anche alcuni vinili, anche se non sono catalogati in questo progetto.</p>
			<div class="flex flex-col items-center mt-4">
				<img src="../assets/collection.jpg" alt="Foto della mia collezione di CD" class="w-3/4 rounded-lg shadow-md" />
				<p class="text-sm italic text-gray-500 mt-2">La mia collezione di CD aggiornata all'8/12/2025</p>
			</div>
			<p>Le tecnologie utilizzate per realizzare questo progetto includono:</p>
			<ul class="list-disc list-inside">
				<li>PHP per la logica lato server;</li>
				<li>MySQL per la gestione del database;</li>
				<li>Tailwind CSS per lo stile e il layout;</li>
				<li>JavaScript per l'interattività lato client;</li>
			</ul>

			<p>Per ulteriori informazioni o domande, non esitate a contattarmi! Qui sotto trovate alcuni miei contatti e la mia pagina Discogs:</p>
			<ul class="list-disc list-inside">
				<li><a href="mailto:alessandro07.pigaiani@gmail.com" class="text-blue-500 underline">Email</a></li>
				<li><a href="https://www.instagram.com/iosonopiga" target="_blank" class="text-blue-500 underline">Instagram</a></li>
				<li><a href="https://www.github.com/AlePiga" target="_blank" class="text-blue-500 underline">GitHub</a></li>
				<li><a href="https://www.discogs.com/user/AlePiga" target="_blank" class="text-blue-500 underline">Discogs</a></li>
			</ul>
		</div>
	</div>
</body>