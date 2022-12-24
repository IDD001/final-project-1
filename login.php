<?php
require_once('./config/Login.php');

if(!empty($_SESSION["id"])){
  header("Location: index.php");
}

$login = new Login();

if(isset($_POST["submit"])){
  $result = $login->login($_POST["usernameemail"], $_POST["password"]);

  if($result == 1){
    $_SESSION["login"] = true;
    $_SESSION["id"] = $login->idUser();
    header("Location: index.php");
  }
  elseif($result == 10){
    echo
    "<script> alert('Wrong Password'); </script>";
  }
  elseif($result == 100){
    echo
    "<script> alert('User Not Registered'); </script>";
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
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="wrapper">
        <div class="form-wrapper sign-in">
            <form action="" class="" method="POST" autocomplete="off">
                <h2>Sign In</h2>
                <div class="input-group">
                    <input type="text" name="usernameemail" placeholder="Username Or Email" required value="" >
                    <label for=""></label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Password" required value="">
                    <label for=""></label>
                </div>
                <div class="remember">
                        <label for=""><input type="checkbox">Remember Me</label>      
                </div>
                <button type="submit" name="submit">Sign</button>
                <div class="signUp-link">
                    <p>Tidak Punya akun? <a href="register.php">SignUp</a></p>
                </div>
              
            </form>
        </div>
    </div>


    <script src="script.js"></script>
</body>
</html>