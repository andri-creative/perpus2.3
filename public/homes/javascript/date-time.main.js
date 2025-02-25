function updateDateTime() {
  let now = new Date();
  let tgl = now.getDate();
  let bulan = now.toLocaleString("id-ID", { month: "long" }); // Nama bulan bahasa Indonesia
  let tahun = now.getFullYear();
  let jam = now.getHours().toString().padStart(2, "0");
  let menit = now.getMinutes().toString().padStart(2, "0");
  // let detik = now.getSeconds().toString().padStart(2, '0');

  let dateTimeString = `${tgl} ${bulan} ${tahun} ${jam}:${menit}`;
  document.getElementById("live-time").innerText = dateTimeString;
}

// Jalankan setiap 1 detik (1000ms)
setInterval(updateDateTime, 1000);

// Panggil sekali saat halaman dimuat
updateDateTime();
