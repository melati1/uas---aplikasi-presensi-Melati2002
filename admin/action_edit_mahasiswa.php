<?php
require('connect_db.php');

$nim           = $_POST['nim'];
$nama          = $_POST['nama'];
$kelas         = $_POST['kelas'];

$query  = "UPDATE mahasiswa SET nim = '$nim', nama = '$nama', kelas = '$kelas'";
$query .= "WHERE nim = '$nim'";
$result = mysqli_query($conn, $query);
if (!$result) {
  die("Query gagal dijalankan: " . mysqli_errno($conn) .
    " - " . mysqli_error($conn));
} else {
  echo "<script>alert('Data berhasil diubah.');window.location='table_mahasiswa.php';</script>";
}