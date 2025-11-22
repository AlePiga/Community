<?php
include '../model/Database.php';

$database = new Database();
$cds = $database->query("SELECT * FROM cds")->fetch_all(MYSQLI_ASSOC);
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
  <script src="../script.js"></script>
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Collezione CD</title>
  <link rel="icon" type="image/x-icon" href="../assets/CDSpin.gif">
</head>

<body class="select-none bg-gray-50 text-gray-800 antialiased">
  <?php require './components/navbar.php'; ?>
  <div class="max-w-6xl mx-auto p-6">
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
                  <button onclick='apriModalModifica(<?= json_encode($cd) ?>)' class="text-gray-500 hover:text-gray-700 mr-3 transition" title="Modifica">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </button>
                  <button onclick="apriModalElimina(<?= $cd['ID'] ?>, '<?= $cd['Album'] ?>')" class="text-gray-500 hover:text-gray-700 transition" title="Elimina">
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
    <p class="text-sm text-center text-gray-500 mt-3">
      <?php if (count($cds) > 0) echo "Caricate " . count($cds) . " righe dal database."; ?>
    </p>
  </div>
  <?php require './components/modalAggiungi.php'; ?>
  <?php require './components/modalModifica.php'; ?>
  <?php require './components/modalElimina.php'; ?>
</body>

</html>