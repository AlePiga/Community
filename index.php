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
        <!-- <p class="text-1 text-center mb-6">Rivivi la magia dei giochi classici: la tua community per console retro!</p>-->
        <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table id="infoTable" class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-100"></thead>
          <tbody class="bg-white divide-y divide-gray-100"></tbody>
        </table>
      </div>

      <p id="status" class="text-sm text-center text-gray-500 mt-3"></p>
    </div>

    <script src="./script.js"></script>
  </body>
</html>
