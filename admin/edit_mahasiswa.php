<?php
require('connect_db.php');

session_start();

if (isset($_SESSION['login']) && $_SESSION['role'] == "Admin") { //jika sudah login
} else if (isset($_SESSION['login']) && $_SESSION['role'] == "Dosen") {
    header("Location: \uas---aplikasi-presensi-Melati2002/index.php");
} 

$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

$sql1 = "SELECT * FROM mahasiswa";
$result1 = mysqli_query($conn, $sql1);

$sql2 = "SELECT * FROM presensi";
$result2 = mysqli_query($conn, $sql2);

if (isset($_GET['id'])) {
  $id = ($_GET["id"]);

  $query = "SELECT * FROM mahasiswa WHERE nim='$id'";
  $result = mysqli_query($conn, $query);
  if (!$result) {
    die("Query Error: " . mysqli_errno($conn) .
      " - " . mysqli_error($conn));
  }
  $data = mysqli_fetch_assoc($result);
  if (!count($data)) {
    echo "<script>alert('Data tidak ditemukan pada database');window.location='mahasiswa.php';</script>";
  }
} else {
  echo "<script>alert('Masukkan data id.');window.location='mahasiswa.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Edit Product</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">

    <div class="container">
        <div class="card card-register mx-auto mt-5">
            <div class="card-header">Edit Produk</div>
            <div class="card-body">
                <form method="POST" action="action_edit_mahasiswa.php" enctype="multipart/form-data">
                <section class="base">
              <input name="nim" value="<?php echo $data['nim']; ?>" hidden />
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Nama Mahasiswa</label>
                                <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>NIM Mahasiswa</label>
                                <input type="text" name="nim" value="<?php echo $data['nim']; ?>" />
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label>Kelas Mahasiswa</label><br>
                                <select class="form-select" aria-label="Default select example" name="kelas"
                                    required="required">
                                    <option selected><?php echo $data['kelas']; ?></option>
                                    <!-- <option value="5A">5A</option> -->
                                    <option value="5B">5B</option>
                                </select>
                            </div>
                        </div>
                    </div>

                   
                    <div>

                        <button type="submit">Update</button>
                    </div>
                    </section>
                </form>

            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>