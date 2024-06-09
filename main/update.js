  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('tombolsimpan').addEventListener('click', function(event) {
        if (!confirm("Apakah Anda yakin ingin menyimpan perubahan?")) {
            event.preventDefault();
            }
        else{
          alert("Data Berhasil diubah!!")
        }
    })});

  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('tombolbatal').addEventListener('click', function(event) {
        if (!confirm("Apakah Anda yakin ingin membuang perubahan?")) {
            event.preventDefault();
            }
        else{
          window.location.href = 'historiPage.php'; // Arahkan kembali ke historiPage.php
        }
    })});