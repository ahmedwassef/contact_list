<?php
require_once 'UsersController.php';

if(isset($_POST['login'])
    and isset($_POST['username'])
    and !empty($_POST['username'])
    and isset($_POST['pass'])
    and !empty($_POST['pass'])) //login form
{

    if (preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['pass'];
        $new_User = new User();
        $new_User->username = $username;
        $new_User->password = $password;
        $new_User->login();
    }
    else{
        $_SESSION['error']='اسم المستخدم خطأ.';
        header('Location: ../login.php');
        exit;
        }
}

  else{
      $_SESSION['error']='من فضلك تأكد من اكمال البيانات.';
      header('Location: ../login.php');
      exit;
  }


?>