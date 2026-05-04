<?php
$conn = new mysqli("localhost", "root", "", "inventory_db");

$id = $_POST['id'];
$quantity = $_POST['quantity'];

$conn->query("UPDATE items SET quantity='$quantity' WHERE id='$id'");

echo "Updated successfully";
?>