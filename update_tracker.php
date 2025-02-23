<?php
require_once( 'DBconnect.php' );


$id = (int)$_POST['id'];
$days_taken = isset($_POST['days_taken']) ? array_map('intval', $_POST['days_taken']) : [];
$days_taken_json = json_encode($days_taken);

$sql = "UPDATE tracker SET days_taken = '$days_taken_json' WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: tracker_page.php?id=" . $id);
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>