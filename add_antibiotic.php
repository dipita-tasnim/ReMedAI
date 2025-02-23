<?php
require_once( 'DBconnect.php' );

$name = $_POST['name'];
$duration = (int)$_POST['duration'];

// Insert data into database
$sql = "INSERT INTO tracker (name, duration) VALUES ('$name', $duration)";
if ($conn->query($sql) === TRUE) {
    header("Location: tracker_page.php?id=" . $conn->insert_id);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>