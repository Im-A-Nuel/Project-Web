document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('bt5').addEventListener('click', function(event) {
        if (confirm("Apakah Anda yakin ingin LogOut?")) {
            window.location.href = 'logout.php';
            }
    })});