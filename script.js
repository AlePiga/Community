function parseCSV(csv) {
  const lines = csv.trim().split("\n"); // divide csv in righe e elimina spazi
  const headers = lines[0].split(",").map((h) => h.trim()); // prima riga = intestazioni
  const rows = lines.slice(1).map((line) => {
    const values = line.split(",").map((v) => v.trim().replace(/^"|"$/g, "")); // per ogni riga divide i valori
    let obj = {};
    headers.forEach((header, i) => {
      obj[header] = values[i] !== undefined ? values[i] : ""; // crea un oggetto { intestazione: valore } per ogni colonna
    });
    return obj;
  });

  return { headers, rows }; // restituisce intestazioni e righe come array di oggetti
}

const statusEl = document.getElementById("status");

fetch("data.csv")
  .then((response) => {
    if (!response.ok) throw new Error("HTTP error " + response.status);
    return response.text();
    // richiesta csv + controllo errori
  })
  .then((text) => {
    const { headers, rows } = parseCSV(text);
    const thead = document.querySelector("#infoTable thead");
    const tbody = document.querySelector("#infoTable tbody");

    if (!rows.length) {
      statusEl.textContent = "Nessun dato trovato nel CSV.";
      return;
    }

    // genera le intestazioni della tabella
    const headerRow = document.createElement("tr");
    headers.forEach((h) => {
      const th = document.createElement("th");
      th.className =
        "px-6 py-3 text-left text-sm font-medium uppercase tracking-wider";
      th.textContent = h;
      headerRow.appendChild(th);
    });
    thead.appendChild(headerRow);

    // genera il corpo della tabella
    rows.forEach((row, idx) => {
      const tr = document.createElement("tr");
      tr.className =
        idx % 2 === 0
          ? "bg-white hover:bg-gray-50"
          : "bg-gray-50 hover:bg-gray-100";
      // alternanza colori righe + hover
      headers.forEach((h) => {
        const td = document.createElement("td");
        td.className = "px-6 py-4 whitespace-nowrap text-sm";
        td.textContent = row[h] || "";
        tr.appendChild(td);
      });

      tbody.appendChild(tr);
    });

    statusEl.textContent = `Caricate ${rows.length} righe dal CSV.`;
  })
  .catch((error) => {
    console.error("Errore nel caricamento del CSV:", error);
    statusEl.textContent =
      "Errore nel caricamento del CSV (controlla la console).";
  });
