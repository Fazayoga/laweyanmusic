<?php
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laweyan Music Store </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--header-->
    <header>
        <div class="container">
            <h1><a href="dashboard.php">Laweyan Music Store</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="keluar.php">Log Out</a></li>
            </ul>
        </div>
    </header>

    <!--Content-->
    <div class="section">
        <div class="container">
            <h3>Tambah Kategori</h3>
            <div class="box">
                <form action="" method="POST"> 
                    <input type="text" name="nama" placeholder="Nama Produk" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['nama'])){

                        $nama = ucwords($_POST['nama']);

                        $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES ( 
                                            null,
                                            '".$nama."') ");
                        if($insert){
                            echo '<script>alert("Tambah kategori berhasil")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }
                    }
                ?>
            </div>
        </div>
    </div>

    <!--Footer-->
    <footer>
        <div class="container">
            <small>Copyright &copy; 2020 - Laweyan Music Store.</small>
        </div>
    </footer>
</body>
</html>