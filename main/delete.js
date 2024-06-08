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
