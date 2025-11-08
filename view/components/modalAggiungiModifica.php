  <!-- Modale Aggiungi/Modifica -->
  <div id="modale" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
      <h2 id="titoloModale" class="text-2xl font-semibold mb-6">Aggiungi CD</h2>
      <form method="POST">
        <input type="hidden" name="id" id="idCD">

        <div class="mb-4">
          <label class="block text-sm font-medium mb-2">Album</label>
          <input type="text" name="album" id="album" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium mb-2">Interprete</label>
          <input type="text" name="interprete" id="interprete" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium mb-2">Anno</label>
          <input type="number" name="anno" id="anno" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-4">
          <label class="block text-sm font-medium mb-2">Paese</label>
          <input type="text" name="paese" id="paese" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="mb-6">
          <label class="block text-sm font-medium mb-2">Rating (1-5)</label>
          <input type="number" name="rating" id="rating" min="1" max="5" required class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex justify-end space-x-3">
          <button type="button" onclick="chiudiModale()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
            Annulla
          </button>
          <button type="submit" name="aggiungi" id="pulsanteSalva" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
            Salva
          </button>
        </div>
      </form>
    </div>
  </div>