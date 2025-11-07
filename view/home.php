<?php
function parseCSV($filePath) {
    $rows = [];
    $headers = [];

    if (($handle = fopen($filePath, "r")) !== false) {
        $headers = fgetcsv($handle); // prima riga = intestazioni
        while (($data = fgetcsv($handle)) !== false) {
            $rows[] = array_combine($headers, $data);
        }
        fclose($handle);
    }

    return [$headers, $rows];
}

list($headers, $rows) = parseCSV("data.csv");
?>
<!DOCTYPE html>
<html lang="it">
  <head>
    <meta charset="UTF-8" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Retro Console Community</title>
  </head>
  <body class="select-none bg-gray-50 text-gray-800 antialiased">
    <div class="max-w-4xl mx-auto p-6">
      <h1 class="text-5xl font-semibold text-center mt-3 mb-8">
        Retro Console Community
      </h1>
      <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table id="infoTable" class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100">
            <tr>
              <?php foreach ($headers as $h): ?>
                <th class="px-6 py-3 text-left text-sm font-medium uppercase tracking-wider">
                  <?= htmlspecialchars($h) ?>
                </th>
              <?php endforeach; ?>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-100">
            <?php if (count($rows) > 0): ?>
              <?php foreach ($rows as $i => $row): ?>
                <tr class="<?= $i % 2 === 0 ? 'bg-white hover:bg-gray-50' : 'bg-gray-50 hover:bg-gray-100' ?>">
                  <?php foreach ($headers as $h): ?>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                      <?= htmlspecialchars($row[$h] ?? "") ?>
                    </td>
                  <?php endforeach; ?>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="<?= count($headers) ?>" class="px-6 py-4 text-center text-sm text-gray-500">
                  Nessun dato trovato nel CSV.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>

      <p id="status" class="text-sm text-center text-gray-500 mt-3">
        <?php
        if (count($rows) > 0) {
            echo "Caricate " . count($rows) . " righe dal CSV.";
        }
        ?>
      </p>
    </div>
  </body>
</html>
