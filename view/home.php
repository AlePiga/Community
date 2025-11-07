<?php
// Per forzare stampa errori su Lampp
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../model/Database.php';

$database = new Database();

if (isset($_POST['aggiungi'])) {
  $album = $database->conn->real_escape_string($_POST['album']); // real_escape_string per inserire album con virgolette...
  $interprete = $database->conn->real_escape_string($_POST['interprete']);
  $anno = intval($_POST['anno']);
  $paese = $database->conn->real_escape_string($_POST['paese']);
  $rating = intval($_POST['rating']);

  $query = "INSERT INTO cds (Album, Interprete, Anno, Paese, Rating)
              VALUES ('$album', '$interprete', $anno, '$paese', $rating)";

  $database->query($query);
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

if (isset($_POST['modifica'])) {
  $id = $database->conn->real_escape_string($_POST['ID']);
  $album = $database->conn->real_escape_string($_POST['album']);
  $interprete = $database->conn->real_escape_string($_POST['interprete']);
  $anno = intval($_POST['anno']);
  $paese = $database->conn->real_escape_string($_POST['paese']);
  $rating = intval($_POST['rating']);

  $query = "UPDATE cds SET
              Album='$album',
              Interprete='$interprete',
              Anno=$anno,
              Paese='$paese',
              Rating=$rating
              WHERE ID=$id";

  $database->query($query);
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

if (isset($_POST['elimina'])) {
  $id = $_POST['id'];
  $query = "DELETE FROM cds WHERE ID=$id";

  $database->query($query);
  header('Location: ' . $_SERVER['PHP_SELF']);
  exit;
}

$query = "SELECT * FROM cds ORDER BY Album ASC";
$result = $database->query($query);

$cds = [];
if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $cds[] = $row;
  }
}

function stelline($numero)
{
  $stellaPiena = '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400 inline" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.287 3.951c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.287-3.951a1 1 0 00-.364-1.118L2.075 9.377c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.95z"/></svg>';
  $stellaVuota = '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-300 inline" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.287 3.951c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.287-3.951a1 1 0 00-.364-1.118L2.075 9.377c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.95z"/></svg>';

  $stelle = "";
  for ($i = 1; $i <= 5; $i++) {
    if ($i <= $numero) {
      $stelle .= $stellaPiena;
    } else {
      $stelle .= $stellaVuota;
    }
  }
  return $stelle;
}
?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8" />
  <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Collezione CD</title>
</head>

<body class="select-none bg-gray-50 text-gray-800 antialiased">
  <div class="max-w-6xl mx-auto p-6">
    <h1 class="text-5xl font-semibold text-center mt-3 mb-8">Collezione CD</h1>

    <!-- Tabella -->
    <div class="overflow-x-auto bg-white rounded-xl shadow">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Album</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Interprete</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Anno</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Paese</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Rating</th>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Azioni</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          <?php if (count($cds) > 0): ?>
            <?php foreach ($cds as $i => $cd): ?>
              <tr class="<?= $i % 2 === 0 ? 'bg-white hover:bg-gray-50' : 'bg-gray-50 hover:bg-gray-100' ?>">
                <td class="px-6 py-4 whitespace-nowrap text-sm"><?= $cd['Album'] ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm"><?= $cd['Interprete'] ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm"><?= $cd['Anno'] ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm"><?= $cd['Paese'] ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm"><?= stelline($cd['Rating']) ?></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  <button onclick='apriModaleModifica(<?= json_encode($cd) ?>)' class="text-gray-500 hover:text-gray-700 mr-3 transition" title="Modifica">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </button>
                  <button onclick="apriModaleElimina(<?= $cd['ID'] ?>, '<?= $cd['Album'] ?>')" class="text-gray-500 hover:text-gray-700 transition" title="Elimina">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="6" class="px-6 py-4 text-center text-sm text-gray-500">
                Nessun CD nel database.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <!-- Testo in fondo alla tabella -->
    <p class="text-sm text-center text-gray-500 mt-3">
      <?php if (count($cds) > 0) echo "Caricate " . count($cds) . " righe dal database."; ?>
    </p>

    <!-- Pulsante Aggiungi -->
    <div class="mb-4 flex justify-end">
      <button onclick="apriModaleAggiungi()" class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-6 py-2 rounded-lg transition">
        Aggiungi CD
      </button>
    </div>
  </div>

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

  <!-- Modale Elimina -->
  <div id="modaleElimina" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
      <h2 class="text-2xl font-semibold mb-4">Conferma Eliminazione</h2>
      <p class="text-gray-600 mb-6">Vuoi eliminare "<span id="nomeAlbum" class="font-semibold"></span>"?</p>
      <form method="POST">
        <input type="hidden" name="id" id="idElimina">
        <div class="flex justify-end space-x-3">
          <button type="button" onclick="chiudiModaleElimina()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
            Annulla
          </button>
          <button type="submit" name="elimina" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
            Elimina
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function apriModaleAggiungi() {
      document.getElementById('modale').classList.remove('hidden'); // Per renderlo invisibile
    }

    function apriModaleModifica(cd) {
      document.getElementById('idCD').value = cd.ID;
      document.getElementById('album').value = cd.Album;
      document.getElementById('interprete').value = cd.Interprete;
      document.getElementById('anno').value = cd.Anno;
      document.getElementById('paese').value = cd.Paese;
      document.getElementById('rating').value = cd.Rating;
      document.getElementById('modale').classList.remove('hidden'); // Per renderlo invisibile
    }

    function chiudiModale() {
      document.getElementById('modale').classList.add('hidden'); // Per renderlo invisibile
    }

    function apriModaleElimina(id, album) {
      document.getElementById('idElimina').value = id;
      document.getElementById('nomeAlbum').textContent = album;
      document.getElementById('modaleElimina').classList.remove('hidden'); // Per renderlo invisibile
    }

    function chiudiModaleElimina() {
      document.getElementById('modaleElimina').classList.add('hidden'); // Per renderlo invisibile
    }
  </script>
</body>

</html>