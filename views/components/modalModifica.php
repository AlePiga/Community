<div id="modalModifica" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.5);">
  <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
    <h2 class="text-2xl font-semibold mb-6">Modifica CD</h2>
    <form method="POST" action="../controls/modifica.php">
      <input type="hidden" name="id" id="idCDm">
      <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Album</label>
        <input type="text" name="album" id="albumm" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Interprete</label>
        <input type="text" name="interprete" id="interpretem" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Anno</label>
        <input type="number" name="anno" id="annom" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="mb-4 relative">
        <label class="block text-sm font-medium mb-2">Paese</label>
        <input type="text" name="paese" id="paesem" autocomplete="off" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        <ul id="dropdownPaesi"
          class="absolute left-0 right-0 bg-white border border-gray-300 rounded-lg shadow-md mt-1 hidden z-10 max-h-40 overflow-y-auto">
        </ul>
      </div>
      <div class="mb-6">
        <label class="block text-sm font-medium mb-2">Rating (da 1 a 5)</label>
        <input type="number" name="rating" id="ratingm" min="1" max="5" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>
      <div class="flex justify-end space-x-3">
        <button type="button" onclick="chiudiModalModifica()"
          class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
          Annulla
        </button>
        <button type="submit" name="modifica" id="pulsanteSalva"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
          Salva
        </button>
      </div>
    </form>
  </div>
</div>