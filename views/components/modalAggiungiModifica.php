<!-- Modale Aggiungi/Modifica -->
<div id="modale" class="hidden fixed inset-0 flex items-center justify-center z-50" style="background-color: rgba(0, 0, 0, 0.5);">
  <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
    <h2 id="titoloModale" class="text-2xl font-semibold mb-6">Aggiungi CD</h2>
    <form method="POST">
      <input type="hidden" name="ID" id="idCD">

      <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Album</label>
        <input type="text" name="album" id="album" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Interprete</label>
        <input type="text" name="interprete" id="interprete" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="mb-4">
        <label class="block text-sm font-medium mb-2">Anno</label>
        <input type="number" name="anno" id="anno" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <!-- AUTOCOMPLETE PAESE --      <!-- AUTOCOMPLETE PAESE -->
      >
      <div class="mb-4 relative">
        <label class="block text-sm font-medium mb-2">Paese</label>
        <input type="text" name="paese" id="paese" autocomplete="off" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">

        <!-- Dropdown -->
        <ul id="dropdownPaesi"
          class="absolute left-0 right-0 bg-white border border-gray-300 rounded-lg shadow-md mt-1 hidden z-10 max-h-40 overflow-y-auto">
        </ul>
      </div>

      <div class="mb-6">
        <label class="block text-sm font-medium mb-2">Rating (1-5)</label>
        <input type="number" name="rating" id="rating" min="1" max="5" required
          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div class="flex justify-end space-x-3">
        <button type="button" onclick="chiudiModale()"
          class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-lg transition">
          Annulla
        </button>
        <button type="submit" name="aggiungi" id="pulsanteSalva"
          class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
          Salva
        </button>
      </div>
    </form>
  </div>
</div>

<script>
  const paesi = [
    "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antartide", "Antigua e Barbuda", "Antille Olandesi", "Arabia Saudita", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaigian", "Bahamas", "Bahrein", "Bangladesh", "Barbados", "Belgio", "Belize", "Benin", "Bermuda",
    "Bhutan", "Bielorussia", "Bolivia", "Bosnia Erzegovina", "Botswana", "Brasile", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambogia", "Camerun", "Canada", "Capo Verde", "Ciad", "Cile", "Cina", "Cipro", "Colombia", "Comore", "Congo", "Corea del Nord", "Corea del Sud", "Costa Rica", "Costa d’Avorio",
    "Croazia", "Cuba", "Danimarca", "Dominica", "Ecuador", "Egitto", "El Salvador", "Emirati Arabi Uniti", "Eritrea", "Estonia", "Etiopia", "Federazione Russa", "Figi", "Filippine", "Finlandia", "Francia", "Gabon", "Gambia", "Georgia", "Georgia del Sud e Isole Sandwich del Sud", "Germania", "Ghana", "Giamaica", "Giappone",
    "Gibilterra", "Gibuti", "Giordania", "Grecia", "Grenada", "Groenlandia", "Guadalupa", "Guam", "Guatemala", "Guernsey", "Guiana Francese", "Guinea", "Guinea Equatoriale", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "India", "Indonesia", "Iran", "Iraq", "Irlanda", "Islanda", "Isola Bouvet", "Isola Norfolk",
    "Isola di Christmas", "Isola di Man", "Isole Aland", "Isole Cayman", "Isole Cocos", "Isole Cook", "Isole Falkland", "Isole Faroe", "Isole Heard ed Isole McDonald", "Isole Marianne Settentrionali", "Isole Marshall", "Isole Minori lontane dagli Stati Uniti", "Isole Solomon", "Isole Turks e Caicos", "Isole Vergini Americane", "Isole Vergini Britanniche",
    "Italia", "Jersey", "Kazakistan", "Kenya", "Kirghizistan", "Kiribati", "Kuwait", "Laos", "Lesotho", "Lettonia", "Libano", "Liberia", "Libia", "Liechtenstein", "Lituania", "Lussemburgo", "Madagascar", "Malawi", "Maldive", "Malesia", "Mali", "Malta", "Marocco", "Martinica", "Mauritania", "Mauritius",
    "Mayotte", "Messico", "Micronesia", "Moldavia", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Mozambico", "Myanmar", "Namibia", "Nauru", "Nepal", "Nicaragua", "Niger", "Nigeria", "Niue", "Norvegia", "Nuova Caledonia", "Nuova Zelanda", "Oman", "Paesi Bassi", "Pakistan", "Palau", "Palestina", "Panama",
    "Papua Nuova Guinea", "Paraguay", "Perù", "Pitcairn", "Polinesia Francese", "Polonia", "Portogallo", "Portorico", "Qatar", "Regione Amministrativa Speciale di Hong Kong della Repubblica Popolare Cinese", "Regione Amministrativa Speciale di Macao della Repubblica Popolare Cinese", "Regno Unito", "Repubblica Ceca", "Repubblica Centrafricana", "Repubblica Democratica del Congo", "Repubblica Dominicana",
    "Repubblica di Macedonia", "Romania", "Ruanda", "Réunion", "Sahara Occidentale", "Saint Kitts e Nevis", "Saint Lucia", "Saint Pierre e Miquelon", "Saint Vincent e Grenadines", "Samoa", "Samoa Americane", "San Bartolomeo", "San Marino", "Sant’Elena", "Sao Tomé e Príncipe", "Senegal", "Serbia", "Serbia e Montenegro", "Seychelles", "Sierra Leone",
    "Singapore", "Siria", "Slovacchia", "Slovenia", "Somalia", "Spagna", "Sri Lanka", "Stati Uniti", "Sudafrica", "Sudan", "Suriname", "Svalbard e Jan Mayen", "Svezia", "Svizzera", "Swaziland", "Tagikistan", "Tailandia", "Taiwan", "Tanzania", "Territori australi francesi", "Territori palestinesi occupati", "Territorio Britannico dell’Oceano Indiano", "Timor Est",
    "Togo", "Tokelau", "Tonga", "Trinidad e Tobago", "Tunisia", "Turchia", "Turkmenistan", "Tuvalu", "Ucraina", "Uganda", "Ungheria", "Uruguay", "Uzbekistan", "Vanuatu", "Vaticano", "Venezuela", "Vietnam", "Wallis e Futuna", "Yemen", "Zambia", "Zimbabwe", "regione non valida o sconosciuta"
  ];

  const inputPaese = document.getElementById("paese");
  const dropdown = document.getElementById("dropdownPaesi");

  inputPaese.addEventListener("input", function() {
    const query = this.value.toLowerCase();
    dropdown.innerHTML = "";
    dropdown.classList.add("hidden");

    if (!query) return;

    const risultati = paesi.filter(p => p.toLowerCase().includes(query));

    if (risultati.length === 0) return;

    risultati.forEach(paese => {
      const li = document.createElement("li");
      li.textContent = paese;
      li.className = "px-3 py-2 cursor-pointer hover:bg-blue-100";
      li.addEventListener("click", function() {
        inputPaese.value = paese;
        dropdown.classList.add("hidden");
      });
      dropdown.appendChild(li);
    });

    dropdown.classList.remove("hidden");
  });

  // Chiudi dropdown cliccando fuori
  document.addEventListener("click", function(e) {
    if (!inputPaese.contains(e.target)) {
      dropdown.classList.add("hidden");
    }
  });
</script>