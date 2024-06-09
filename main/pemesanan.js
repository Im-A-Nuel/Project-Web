function validateForm() {
    // Ambil nilai dari input
    var nama = document.getElementById("datanama").value;
    var nomer = document.getElementById("notelpdata").value;
    var email = document.getElementById("dataemailform").value;
    var nik = document.getElementById("dataNIK").value;
    var tanggal = document.getElementById("datatanggal").value;
    var kelamin = document.getElementById("kelamindata").value;
    var paketCheckboxes = document.querySelectorAll('.paket');
    var totalQty = 0;
    var errors = [];

    // Validasi untuk input kosong
    if (nama === "" || nomer === "" || email === "" || nik === "" || tanggal === "" || kelamin === "") {
        errors.push("Harap lengkapi semua data!");
    }

    // Validasi untuk pemilihan paket
    for (var i = 0; i < paketCheckboxes.length; i++) {
        if (paketCheckboxes[i].checked) {
            var qtyInput = document.querySelector("input[name='qty_" + paketCheckboxes[i].value + "']");
            var qty = parseInt(qtyInput.value);
            totalQty += qty;
            if (qty > parseInt(paketCheckboxes[i].getAttribute('data-stok'))) {
                errors.push("Jumlah tiket " + paketCheckboxes[i].getAttribute('data-deskripsi') + " melebihi stok yang tersedia!");
            }
        }
    }

    // Validasi untuk total jumlah tiket
    if (totalQty === 0) {
        errors.push("Harap pilih minimal satu paket tiket!");
    }

    // Jika ada error, tampilkan pesan error
    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }

    // Semua validasi berhasil
    return true;
}

// Fungsi untuk mereset form
function resetForm() {
    document.getElementById("form").reset();
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tombolsimpan').addEventListener('click', function(event) {
        // Validate the form
        if (!validateForm()) {
            event.preventDefault(); // Mencegah pengiriman form jika validasi gagal
            return;
        }

        // If form is valid, ask for confirmation
        if (!confirm("Apakah Anda yakin ingin memesan Tiket ini?")) {
            event.preventDefault(); // Mencegah pengiriman form jika pengguna membatalkan
            return;
        }

        // If user confirms, show success message
        alert("Pemesanan Berhasil Disimpan");
    });
});
