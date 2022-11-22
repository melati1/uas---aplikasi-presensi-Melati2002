<?php
require "connect.php";

// sql to delete a record
$sql = "DELETE FROM presensi WHERE name = '$_GET[name]'";

if ($conn->query($sql) === TRUE) {
  header('Location:table_presensi.php');
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>