
<html>

<head>
    <meta charset="utf-8">
    <link  rel="stylesheet"href="css/bootstrap.minar.css">
    <link  rel="stylesheet"href="css/font-awesome.min.css">

 <link  rel="stylesheet"href="css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<?php
@session_start();
if(isset($_SESSION['user_name']))
{
    header('Location: index.php');
    exit;
}
include_once('navbar.php');
?>
<h1>تسجيل الدخول </h1>


<form id="RForm"   method="post"   action="controller/LoginController.php" role="form" enctype="multipart/form-data"/ >

    <h1>: من فضلك املئ البيانات التالية بصورة صحيحة لتسجيل الدخول  </h1>


    <div class="contentform">

        <?php
        if(isset($_SESSION['error']))
        {
            echo " <div class='alert alert-danger text-right'>" .$_SESSION['error']. "<i class='fa fa-exclamation-triangle' ></i></div>";
            unset($_SESSION['error']);
        }
        ?>
            <div class="form-group">
                <p>اسم المستخدم  <span>*</span></p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input type="text" name="username" id="username" class="form-control" required/>
                <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">

                <p>كلمة المرور  <span>*</span></p>
                <span class="icon-case"><i class="fa fa-pencil"></i></span>
                <input type="password" name="pass"   id="pass" class="form-control" placeholder=" ادخل كلمة المرور هنا من فضلك" required/></textarea>
                <br>
                <br>
                <div class="help-block with-errors"></div>
            </div>

        </div>
    </div>
    <button type="submit" name="login" value="login"class="bouton-contact">تسجيل الدخول</button>

        </div>
</form>
<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="validator.min.js"></script>

</body>
</html>