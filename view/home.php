<?php
// Per forzare stampa errori su Lampp
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../model/Database.php';

$database = new Database();

// Gestione delle operazioni CRUD
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';

  if ($action === 'add') {
    $album = $database->conn->real_escape_string($_POST['album'] ?? '');
    $interprete = $database->conn->real_escape_string($_POST['interprete'] ?? '');
    $anno = (int)($_POST['anno'] ?? 0);
    $paese = $database->conn->real_escape_string($_POST['paese'] ?? '');
    $rating = (int)($_POST['rating'] ?? 0);

    $query = "INSERT INTO cds (Album, Interprete, Anno, Paese, Rating) VALUES ('$album', '$interprete', $anno, '$paese', $rating)";
    $database->query($query);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }

  if ($action === 'edit') {
    $id = (int)($_POST['id'] ?? 0);
    $album = $database->conn->real_escape_string($_POST['album'] ?? '');
    $interprete = $database->conn->real_escape_string($_POST['interprete'] ?? '');
    $anno = (int)($_POST['anno'] ?? 0);
    $paese = $database->conn->real_escape_string($_POST['paese'] ?? '');
    $rating = (int)($_POST['rating'] ?? 0);

    $query = "UPDATE cds SET Album='$album', Interprete='$interprete', Anno=$anno, Paese='$paese', Rating=$rating WHERE id=$id";
    $database->query($query);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }

  if ($action === 'delete') {
    $id = (int)($_POST['id'] ?? 0);
    $query = "DELETE FROM cds WHERE id=$id";
    $database->query($query);
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
  }
}

$query = "SELECT id, Album, Interprete, Anno, Paese, Rating FROM cds";
$result = $database->query($query);

$rows = [];
$headers = ['Album', 'Interprete', 'Anno', 'Paese', 'Rating'];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
  }
}

function stelline($rating)
{
  $piena = '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-yellow-400 inline" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.287 3.951c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.287-3.951a1 1 0 00-.364-1.118L2.075 9.377c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.95z"/></svg>';
  $vuota = '<svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-300 inline" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.95a1 1 0 00.95.69h4.15c.969 0 1.371 1.24.588 1.81l-3.36 2.44a1 1 0 00-.364 1.118l1.287 3.951c.3.921-.755 1.688-1.54 1.118l-3.36-2.44a1 1 0 00-1.175 0l-3.36 2.44c-.785.57-1.84-.197-1.54-1.118l1.287-3.951a1 1 0 00-.364-1.118L2.075 9.377c-.783-.57-.38-1.81.588-1.81h4.15a1 1 0 00.95-.69l1.286-3.95z"/></svg>';

  $output = "";
  for ($i = 1; $i <= 5; $i++) {
    $output .= $i <= $rating ? $piena : $vuota;
  }
  return $output;
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
    <div class="overflow-x-auto bg-white rounded-xl shadow">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-100">
          <tr>
            <?php foreach ($headers as $h): ?>
              <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">
                <?= htmlspecialchars($h) ?>
              </th>
            <?php endforeach; ?>
            <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">Azioni</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-100">
          <?php if (count($rows) > 0): ?>
            <?php foreach ($rows as $i => $row): ?>
              <tr class="<?= $i % 2 === 0 ? 'bg-white hover:bg-gray-50' : 'bg-gray-50 hover:bg-gray-100' ?>">
                <?php foreach ($headers as $h): ?>
                  <td class="px-6 py-4 whitespace-nowrap text-sm">
                    <?php if ($h === 'Rating'): ?>
                      <?= stelline((int)$row[$h]) ?>
                    <?php else: ?>
                      <?= htmlspecialchars($row[$h] ?? "") ?>
                    <?php endif; ?>
                  </td>
                <?php endforeach; ?>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  <button onclick='openEditModal(<?= json_encode($row) ?>)' class="text-gray-500 hover:text-gray-700 mr-3 transition" title="Modifica">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </button>
                  <button onclick="openDeleteModal(<?= $row['id'] ?>, '<?= htmlspecialchars($row['Album'], ENT_QUOTES) ?>')" class="text-gray-500 hover:text-gray-700 transition" title="Elimina">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="<?= count($headers) + 1 ?>" class="px-6 py-4 text-center text-sm text-gray-500">
                Nessun dato trovato nel database.
              </td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>

    <p class="text-sm text-center text-gray-500 mt-3">
      <?php if (count($rows) > 0) echo "Caricate " . count($rows) . " righe dal database."; ?>
    </p>
    <div class="mb-4 flex justify-end">
      <button onclick="openAddModal()" class="bg-gradient-to-r from-indigo-600 to-indigo-500 text-white font-medium px-6 py-2 rounded-lg transition">Aggiungi CD</button>
    </div>
  </div>

  <!-- Modal Aggiungi/Modifica -->
  <div id="formModal" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
      <h2 id="modalTitle" class="text-2xl font-semibold mb-6">Aggiungi CD</h2>
      <form method="POST">
        <input type="hidden" name="action" id="formAction" value="add">
        <input type="hidden" name="id" id="cdId">

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
          <button type="button" onclick="closeModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
            Annulla
          </button>
          <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
            Salva
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Elimina -->
  <div id="deleteModal" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
      <h2 class="text-2xl font-semibold mb-4">Conferma Eliminazione</h2>
      <p class="text-gray-600 mb-6">Sei sicuro di voler eliminare "<span id="deleteAlbumName" class="font-semibold"></span>"?</p>
      <form method="POST">
        <input type="hidden" name="action" value="delete">
        <input type="hidden" name="id" id="deleteId">
        <div class="flex justify-end space-x-3">
          <button type="button" onclick="closeDeleteModal()" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
            Annulla
          </button>
          <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition">
            Elimina
          </button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function openAddModal() {
      document.getElementById('modalTitle').textContent = 'Aggiungi CD';
      document.getElementById('formAction').value = 'add';
      document.getElementById('cdId').value = '';
      document.getElementById('album').value = '';
      document.getElementById('interprete').value = '';
      document.getElementById('anno').value = '';
      document.getElementById('paese').value = '';
      document.getElementById('rating').value = '';
      document.getElementById('formModal').classList.remove('hidden');
    }

    function openEditModal(cd) {
      document.getElementById('modalTitle').textContent = 'Modifica CD';
      document.getElementById('formAction').value = 'edit';
      document.getElementById('cdId').value = cd.id;
      document.getElementById('album').value = cd.Album;
      document.getElementById('interprete').value = cd.Interprete;
      document.getElementById('anno').value = cd.Anno;
      document.getElementById('paese').value = cd.Paese;
      document.getElementById('rating').value = cd.Rating;
      document.getElementById('formModal').classList.remove('hidden');
    }

    function closeModal() {
      document.getElementById('formModal').classList.add('hidden');
    }

    function openDeleteModal(id, album) {
      document.getElementById('deleteId').value = id;
      document.getElementById('deleteAlbumName').textContent = album;
      document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeDeleteModal() {
      document.getElementById('deleteModal').classList.add('hidden');
    }
  </script>
</body>

</html>