<div id="modalElimina" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.5);">
	<div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
		<h2 class="text-2xl font-semibold mb-4">Conferma eliminazione</h2>
		<p class="text-gray-600 mb-6">Sei sicuro di voler eliminare <span id="nomeAlbum" class="font-semibold"></span> dal database?</p>
		<form method="POST">
			<input type="hidden" name="idElimina" id="idElimina">
			<div class="flex justify-end space-x-3">
				<button type="button" onclick="chiudiModalElimina()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
					Annulla
				</button>
				<button type="submit" name="elimina" formaction="../controls/elimina.php" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
					Elimina
				</button>
			</div>
		</form>
	</div>
</div>