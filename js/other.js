function jam() {
  const jam = new Date().getHours();
  let sapaan = "";

  if (jam >= 4 && jam < 11) {
    sapaan = "Selamat Pagi,";
  } else if (jam >= 11 && jam < 15) {
    sapaan = "Selamat Siang,";
  } else if (jam >= 15 && jam < 18) {
    sapaan = "Selamat Sore,";
  } else {
    sapaan = "Selamat Malam,";
  }

  return sapaan;
}

document.getElementById("jam").innerText = jam();


function searchGedung() {
  let input = document.getElementById("searchInput").value.toLowerCase();
  let rows = document.querySelectorAll("#gedungTable article");

  rows.forEach(function (row) {
    let namaEl = row.querySelector(".nama_gedung");
    if (!namaEl) return; // skip kalau tidak ada

    let nama = namaEl.textContent.toLowerCase();

    if (nama.includes(input)) {
      row.style.display = "";
    } else {
      row.style.display = "none";
    }
  });
}