<?php
require('connect.php');

  $nama   = $_POST['nama'];
  $nim     = $_POST['nim'];
  $kelas         = $_POST['kelas'];
  
  $created       = date("created");
  $modified      = $created;
                  
  $query = "INSERT INTO mahasiswa (nama, nim, kelas) VALUES ('$nama', '$nim', '$kelas')";
                  $result = mysqli_query($conn, $query);
                  
                  if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                           " - ".mysqli_error($conn));
                  } else {
                    echo "<script>alert('Data berhasil ditambah.');window.location='table_mahasiswa.php';</script>";
                  }

  