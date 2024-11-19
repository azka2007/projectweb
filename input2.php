<?php 
// Include database connection
include "koneksidb.php"; 

// Check if the 'simpan' button is clicked
if (isset($_POST['simpan'])) {     
    // Sanitize the inputs to prevent SQL injection
    $Username = mysqli_real_escape_string($koneksidb, $_POST['Username']);
    $Password = mysqli_real_escape_string($koneksidb, $_POST['Password']);
    $Email = mysqli_real_escape_string($koneksidb, $_POST['Email']);
    
    // Hash the password before saving to the database
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);

    // Prepare the SQL query with a prepared statement
    $simpan = mysqli_query($koneksidb, "INSERT INTO user (Username, Password, Email) 
                                       VALUES ('$Username', '$Password', '$Email')");

    // Check if the query was successful
    if ($simpan) {
        echo "<script> alert('Berhasil simpan registrasi'); </script>";
        echo "<script> window.location.href='home3.php'; </script>";
    } else {
        echo "<script> alert('Gagal menyimpan data!'); </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Latihan PHP - Registrasi</title>
</head>
<style>
        body {
            background-image: url(work.jpg);
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
    </style>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                </li>
            </ul>
        </div>
        </div>
    </nav>
    <div class="container">
        <h2 class="text-center">DAFTAR EGO LIFTING</h2>
        <form class="d-flex flex-column justify-content-center align-items-center" method="post">
            <div class="mb-5">
                <label for="Username">Nama Pengguna</label>
                <input type="text" required name="Username" class="form-control">
            </div>
 
            <div class="mb-5">
                <label for="Password">Password</label>
                <input type="Password" required name="Password" class="form-control">
            </div>

            <div class="mb-5">
                <label for="Email">Email</label>
                <input type="Email" required name="Email" class="form-control">
            </div>

            <div class="d-grid gap-2 mx-auto">
                
                <button class="btn btn-primary" name="simpan" type="submit">Daftar</button>
                <input class="btn btn-danger" type="reset" value="Reset">
            </div>
        </form>
    </div>
</body>
</html>
