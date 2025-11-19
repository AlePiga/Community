function apriModalAggiungi() {
	document.getElementById("album").value = ""; // Quando apro il modale i campi sono vuoti
	document.getElementById("interprete").value = "";
	document.getElementById("anno").value = "";
	document.getElementById("paese").value = "";
	document.getElementById("rating").value = "";
	document.getElementById("idCD").value = "";
	document.getElementById("modalAggiungi").classList.remove("hidden"); // Per renderlo invisibile
}

function apriModalModifica(cd) {
	document.getElementById("idCDm").value = cd.ID;
	document.getElementById("albumm").value = cd.Album;
	document.getElementById("interpretem").value = cd.Interprete;
	document.getElementById("annom").value = cd.Anno;
	document.getElementById("paesem").value = cd.Paese;
	document.getElementById("ratingm").value = cd.Rating;
	document.getElementById("modalModifica").classList.remove("hidden");
}

function chiudiModalAggiungi() {
	document.getElementById("modalAggiungi").classList.add("hidden");
}

function chiudiModalModifica() {
	document.getElementById("modalModifica").classList.add("hidden");
}

function apriModalElimina(id, album) {
	document.getElementById("idElimina").value = id;
	document.getElementById("nomeAlbum").textContent = album;
	document.getElementById("modalElimina").classList.remove("hidden");
}

function chiudiModalElimina() {
	document.getElementById("modalElimina").classList.add("hidden");
}
