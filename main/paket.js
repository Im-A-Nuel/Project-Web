// Tunggu hingga konten halaman selesai dimuat
document.addEventListener('DOMContentLoaded', function() {
    // Pilih semua kotak centang paket
    const paketCheckboxes = document.querySelectorAll('.paket');

    // Tambahkan event listener perubahan untuk setiap kotak centang
    paketCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                // Nonaktifkan semua kotak centang dan input kecuali yang sedang dicek
                paketCheckboxes.forEach(function(otherCheckbox) {
                    if (otherCheckbox !== checkbox) {
                        otherCheckbox.disabled = true;
                        otherCheckbox.closest('tr').querySelector('.qty_paket').disabled = true;
                    }
                });
            } else {
                // Aktifkan semua kotak centang dan input jika tidak ada yang dicek
                let anyChecked = false;
                paketCheckboxes.forEach(function(otherCheckbox) {
                    if (otherCheckbox.checked) {
                        anyChecked = true;
                    }
                });

                if (!anyChecked) {
                    paketCheckboxes.forEach(function(otherCheckbox) {
                        otherCheckbox.disabled = false;
                        otherCheckbox.closest('tr').querySelector('.qty_paket').disabled = false;
                    });
                }
            }
        });
    });
});

