<?php
require_once('./config/Dbconfig.php');
$db = new DbConfig();


// this is register
class Register extends Dbconfig{
    public function registration($nama, $username, $email, $password, $confirmpassword){
      $duplicate = mysqli_query($this->connection, "SELECT * FROM users WHERE email = '$email' OR username = '$username' AND password = '$password'");
      if(mysqli_num_rows($duplicate) > 0){
        return 10;
        // email has already taken
      }
      else{
        if($password == $confirmpassword){
          $query = "INSERT INTO users VALUES('', '$nama', '$username', '$email', '$password')";
          mysqli_query($this->connection, $query);
          return 1;
          // Registration successful
        }
        else{
          return 100;
          // Password does not match
        }
      }
    }
  }
  
  
  // this is Logins
  class Login extends Dbconfig{
    public $id;
    public function login($usernameemail, $password){
      $result = mysqli_query($this->connection, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
      $row = mysqli_fetch_assoc($result);
  
      if(mysqli_num_rows($result) > 0){
        if($password == $row["password"]){
          $this->id = $row["id"];
          return 1;
          // Login successful
        }
        else{
          return 10;
          // Wrong password
        }
      }
      else{
        return 100;
        // User not registered
      }
    }
  
    public function idUser(){
      return $this->id;
    }
  }
  
  class Select extends Dbconfig{
    public function selectUserById($id){
      $result = mysqli_query($this->connection, "SELECT * FROM users WHERE id = $id");
      return mysqli_fetch_assoc($result);
    }
  }
  