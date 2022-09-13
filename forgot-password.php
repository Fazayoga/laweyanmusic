
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

    <style>
         #bg-login {
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
        }

        .box-login {
            width: 350px;
            min-height: 250px;
            border: 1px solid #ccc;
            background-color: #fff;
            padding: 15px;
            box-sizing: border-box;
        }

        .box-login h2 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        .input-control {
            font-size: 20px;
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .btn {
            padding: 10px 10px;
            background-color: #C70039;
            color: #fff;
            border: none;
            cursor: pointer;
            font-size: 15px;
        }
    </style>
</head>
<body id="bg-login">
    <div class="box-login">
        <form action="" method="POST">
            <h2>Forgot Password</h2>
            <form action="" method="POST"> 
                <input type="password" name="pass1" placeholder="New Password" class="input-control" required>
                <input type="password" name="pass2" placeholder="Confirm Password" class="input-control" required>
                <input type="submit" name="change_password" value="Change Password" class="btn">
            </form>
            <?php
                    if(isset($_POST['ubah_password'])){

                        $pass1   = $_POST['pass1'];
                        $pass2   = $_POST['pass2'];
                        
                        if($pass2 != $pass1){
                            echo '<script>alert("Konfirmasi Password Baru tidak sesuai")</script>';
                        }else{
                            $u_pass = mysqli_query($conn, "UPDATE tb_admin SET
                                        password = '".MD5($pass1)."' 
                                        WHERE admin_id = '".$d->admin_id."' ");
                            if($u_pass){
                                echo '<script>alert("Change Password Succeed")</script>' ;
                                echo '<script>window.location="login.php"</script>' ;
                            }else{
                                echo 'gagal'.mysqli_error($conn);
                            }
                        }
                    }
                ?>
    </div>
</body>
</html>