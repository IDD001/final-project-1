<?php
require_once('./config/Login.php');

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$register = new Register();

if(isset($_POST["submit"])){
  $result = $register->registration($_POST["nama"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

  if($result == 1){
    echo
    "<script> alert('Registrasi Berhasil'); </script>";
  }
  elseif($result == 10){
    echo
    "<script> alert('Username Atau Email Sudah Ada'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('Password Tidak Cocok'); </script>";
  }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--  -->
    <link rel="stylesheet" href="css/register1.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" method="POST" autocomplete="off">
                <h2 class="">Sign In</h2>
                <div class="input-group">
                    <input id="satu" type="text" placeholder="Name" name="nama" required >
                    <label for=""></label>
                </div>
                <div class="input-group">
                    <input type="text" name="username"  placeholder="Username" required>
                    <label for=""></label>
                </div>
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                    <label for=""></label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required>
                    <label for=""></label>
                </div>
                <div class="input-group ">
                    <input type="password" name="confirmpassword" placeholder="Konfirmasi Password" required>
                    <label for=""></label>
                </div>
               
                <button class="id" type="submit" name="submit">Sign</button>
                <div class="signUp-link">
                    <p>Tidak Punya akun? <a href="login.php">SignUp</a></p>
                </div>
              
            </form>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>

