function confirmDelete(id) {
    if (confirm("Apakah anda ingin membatalkan pemesanan?")) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Response received: " + xhr.responseText);
                    if (xhr.responseText.trim() === "success") {
                        alert("Pesanan berhasil dibatalkan.");
                        refreshPage();
                    } else {
                        alert("Pesanan gagal dibatalkan: " + xhr.responseText);
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
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "bayar.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Response received: " + xhr.responseText);
                    if (xhr.responseText.trim() === "success") {
                        alert("Pembayaran dibatalkan!!: " + xhr.responseText);
                        } else {
                            alert("Pembayaran berhasil!");
                            refreshPage();
                    }
                    refreshPage();
                } else {
                    console.log("AJAX request failed: " + xhr.status);
                    alert("There was a problem with the request.");
                }
            }
        };
        xhr.send("id=" + id); // Kirim ID ke bayar.php
    } else {
        alert("Pembayaran dibatalkan.");
    }
}
