<?php
require_once 'ContactsController.php';

if(isset($_POST['add'])
    and isset($_POST['prenom'])
    and !empty($_POST['prenom'])
    and isset($_POST['phone'])
    and !empty($_POST['phone'])
    and isset($_POST['email'])
    and !empty($_POST['email'])
    and isset($_POST['country'])
    and !empty($_POST['country'])
    and isset($_POST['city'])
    and !empty($_POST['city'])
    and isset($_POST['street'])
    and !empty($_POST['street'])
and isset($_SESSION['user_name'])) //add new form
{
if(preg_match('/^[a-z ,.\'-]+$/i', ($_POST['prenom']))&&preg_match('/^[a-z ,.\'-]+$/i', ($_POST['city']))&&preg_match('/^[a-z ,.\'-]+$/i', ($_POST['country']))&&preg_match('/^[a-z ,.\'-]+$/i', ($_POST['street']))&&preg_match('/^[0-9 ,.\'-]+$/i', ($_POST['phone']))&&filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
{
    $username = $_SESSION['user_name'];
    $name = $_POST['prenom'];
    $email = $_POST['email'];
    $mobile = $_POST['phone'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $street = $_POST['street'];

    $new_Contact = new Contact();
    $new_Contact->username = $username;
    $new_Contact->name = $name;
    $new_Contact->email = $email;
    $new_Contact->mobile = $mobile;
    $new_Contact->country = $country;
    $new_Contact->city = $city;
    $new_Contact->street = $street;
    $new_Contact->add();
}
    else{
        $_SESSION['error']='البيانات غير صحيحة.';
        header('Location: ../newcontacts.php');
        exit;
    }
}
 else{
      $_SESSION['error']='من فضلك تأكد من اكمال البيانات.';
      header('Location: ../newcontacts.php');
      exit;
  }


?>