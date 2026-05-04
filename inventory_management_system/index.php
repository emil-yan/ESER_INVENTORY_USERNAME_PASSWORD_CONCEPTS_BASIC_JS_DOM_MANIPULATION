<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["item"];
    $qty = $_POST["quantity"];

    $conn->query("INSERT INTO items (name, quantity) VALUES ('$name', '$qty')");
}

$result = $conn->query("SELECT * FROM items");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventory System</title>
    <style>
        body { font-family: Arial; }
        table, th, td { border: 1px solid black; border-collapse: collapse; padding: 5px; }
        td { cursor: pointer; }
    </style>
</head>
<body>

<h2>Inventory System</h2>

<form method="POST">
    Item: <input type="text" name="item" required><br><br>
    Quantity: <input type="number" name="quantity" required><br><br>
    <button type="submit">Submit</button>
</form>

<br>

<label>
    <input type="checkbox" id="toggleTable"> View table
</label>

<br><br>

<table id="inventoryTable" style="display:none;">
    <tr>
        <th>Item</th>
        <th>Quantity</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['name'] ?></td>
        <td ondblclick="editQuantity(this, <?= $row['id'] ?>)">
            <?= $row['quantity'] ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<script src="script.js"></script>

</body>
</html>