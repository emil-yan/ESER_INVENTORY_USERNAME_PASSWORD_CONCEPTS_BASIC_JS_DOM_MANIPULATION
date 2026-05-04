// Toggle table visibility
document.getElementById("toggleTable").addEventListener("change", function() {
    document.getElementById("inventoryTable").style.display = this.checked ? "table" : "none";
});

// Double-click edit
function editQuantity(cell, id) {
    let currentValue = cell.innerText;

    // Prevent multiple inputs
    if (cell.querySelector("input")) return;

    let input = document.createElement("input");
    input.type = "number";
    input.value = currentValue;

    cell.innerHTML = "";
    cell.appendChild(input);
    input.focus();

    // When user presses Enter or leaves input
    input.addEventListener("blur", save);
    input.addEventListener("keypress", function(e) {
        if (e.key === "Enter") save();
    });

    function save() {
        let newValue = input.value;

        // AJAX request to update database
        fetch("update.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: `id=${id}&quantity=${newValue}`
        })
        .then(res => res.text())
        .then(data => {
            console.log("Update response:", data);
            cell.innerText = newValue;
        });
    }
}