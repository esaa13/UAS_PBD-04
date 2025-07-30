<?php
include 'config.php';
$id = $_GET['id'];

$sql = "DELETE FROM products WHERE productCode='$id'";
if ($conn->query($sql) === TRUE) {
  header("Location: index.php");
} else {
  echo "Error deleting record: " . $conn->error;
}
?>
    