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

    // Validasi untuk input kosong
    if (nama == "" || nomer == "" || email == "" || nik == "" || tanggal == "" || kelamin == "") {
        alert("Harap lengkapi semua data!");
        return false;
    }

    // Validasi untuk pemilihan paket
    for (var i = 0; i < paketCheckboxes.length; i++) {
        if (paketCheckboxes[i].checked) {
            var qtyInput = document.getElementById("qty_" + paketCheckboxes[i].value);
            var qty = parseInt(qtyInput.value);
            totalQty += qty;
            if (qty > parseInt(paketCheckboxes[i].getAttribute('data-stok'))) {
                alert("Jumlah tiket " + paketCheckboxes[i].getAttribute('data-deskripsi') + " melebihi stok yang tersedia!");
                return false;
            }
        }
    }

    // Validasi untuk total jumlah tiket
    if (totalQty == 0) {
        alert("Harap pilih minimal satu paket tiket!");
        return false;
    }

    // Semua validasi berhasil
    alert("Pemesanan Berhasil Disimpan");
    return true;
}

// Fungsi untuk mereset form
function resetForm() {
    document.getElementById("form").reset();
}

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tombolsimpan').addEventListener('click', function(event) {
        if (!confirm("Apakah Anda yakin ingin memesan Tiket ini?")) {
            event.preventDefault(); // Mencegah pengiriman form jika pengguna membatalkan
            return;
        }
    });
}
)