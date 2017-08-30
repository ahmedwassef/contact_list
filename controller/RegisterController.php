<?php
require_once 'UsersController.php';

if(isset($_POST['register'])
    and isset($_POST['username'])
    and !empty($_POST['username'])
    and isset($_POST['pass'])
    and !empty($_POST['pass'])
    and isset($_POST['repass'])
    and !empty($_POST['repass'])
    and isset($_POST['prenom'])
    and !empty($_POST['prenom'])
    and isset($_POST['secnom'])
    and !empty($_POST['secnom'])
    and isset($_POST['optradio'])
    and !empty($_POST['optradio'])
    and isset($_POST['cap'])
    and !empty($_POST['cap'])
    and isset($_POST['test'])
    and !empty($_POST['test'])) //registration form
{

    if($_POST['pass'] != $_POST['repass'])
    {

            $_SESSION['error']='كلمتا المرور غير متطابقتين.';
            header('Location: ../register.php');
        exit;
    }
    if($_POST['test'] != $_POST['cap'])
    {

        $_SESSION['error']='من فضلك أعد المحاولة  وتاكد أن الرمز مطابق.';
        header('Location: ../register.php');
        exit;
    }
    $uppercase = preg_match('@[A-Z]@', $_POST['pass']);
    $lowercase = preg_match('@[a-z]@', $_POST['pass']);
    $number    = preg_match('@[0-9]@', $_POST['pass']);

    if(!$uppercase || !$lowercase || !$number || strlen($_POST['pass']) < 8) {
        $_SESSION['error']='يجب ادخال رقم سري يحتوي علي الاقل علي حرف واحد كبير وحرف واحد صغير ورقم واحد وان يكون أكبر من 8 حروف.';
        header('Location: ../register.php');
        exit;
        // tell the user something went wrong
    }

        if (preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $_POST['username']) && preg_match('/^[a-z ,.\'-]+$/i', ($_POST['prenom']))&& preg_match('/^[a-z ,.\'-]+$/i', ($_POST['secnom'])))
        {
            $username = $_POST['username'];
            $first_name = $_POST['prenom'];
            $second_name = $_POST['secnom'];
            $gender = $_POST['optradio'];
            $password = $_POST['pass'];
            $type = "1";

            $new_User = new User();
            $new_User->username = $username;
            $new_User->first_name = $first_name;
            $new_User->second_name = $second_name;
            $new_User->gender = $gender;
            $new_User->password = $password;

            $new_User->register();

        }
        else
        {
            $_SESSION['error']='يجب ادخال اسماء خقيقية.';
            header('Location: ../register.php');
            exit;
        }

}

  else{
      $_SESSION['error']='من فضلك تأكد من اكمال البيانات.';
      header('Location: ../register.php');
      exit;
  }


?>