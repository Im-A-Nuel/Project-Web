function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this record?")) {
        // Perform AJAX request to delete the record
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Response received: " + xhr.responseText);
                    if (xhr.responseText.trim() === "success") {
                        alert("Record successfully deleted.");
                        refreshPage();
                    } else {
                        alert("Error deleting record: " + xhr.responseText);
                    }
                } else {
                    console.log("AJAX request failed: " + xhr.status);
                    alert("There was a problem with the request.");
                }
            }
        };
        xhr.send("id=" + id);
    }
}

function refreshPage() {
    window.location.reload();
}

function confirmPayment(id) {
    if (confirm("Apakah Anda yakin ingin melakukan pembayaran?")) {
        // Kirim permintaan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "bayar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Response received: " + xhr.responseText);
                    if (xhr.responseText.trim() === "success") {
                        alert("Pembayaran berhasil!");
                        window.location.href = "historiPage.php"; // Redirect ke historiPage.php setelah pembayaran berhasil
                    } else {
                        alert("Error: " + xhr.responseText);
                    }
                } else {
                    console.log("AJAX request failed: " + xhr.status);
                    alert("There was a problem with the request.");
                }
            }
        };
        xhr.send("id=" + id); // Kirim ID ke bayar.php
    } else {
        // Jika pengguna menekan tombol Cancel pada alert
        alert("Pembayaran dibatalkan.");
    }
}
