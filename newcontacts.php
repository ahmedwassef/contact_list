
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
if(!isset($_SESSION['user_name']))
{
    header('Location: login.php');
    exit;
}
include_once('navbar.php');
?>
<h1>اضافه جديد </h1>


<form id="RForm"   method="post"   action="controller/addnew.php" role="form" enctype="multipart/form-data">

    <h1>: من فضلك املئ البيانات التالية بصورة صحيحة للتسجيل بالقائمة  </h1>

    <div class="contentform">

        <?php
        if(isset($_SESSION['error']))
        {
            echo " <div class='alert alert-danger text-right'>" .$_SESSION['error']. "<i class='fa fa-exclamation-triangle' ></i></div>";
            unset($_SESSION['error']);
        }
        ?>
        <?php
        if(isset($_SESSION['success']))
        {
            echo " <div class='alert alert-success text-right'>" .$_SESSION['success']. "<i class='fa fa-exclamation-triangle' ></i></div>";
            unset($_SESSION['success']);
        }
        ?>


        <div class="form-group">
            <p>الاسم  <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="prenom" id="name" class="form-control" placeholder="" required/>

            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <p>الهاتف  <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="phone" class="form-control" id="phone" required>
            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">

                <p>ايميل <span>*</span></p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input type="email" name="email"   id="email" class="form-control" required/></textarea>
                <br>
                <br>
                <div class="help-block with-errors"></div>
            </div>
        <div class="form-group">
            <p>البلد  <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="country" class="form-control" id="country" required/>

            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <p>المدينة  <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="city" id="city" class="form-control" required/>

            <div class="help-block with-errors"></div>
        </div>
        <div class="form-group">
            <p>الشارع  <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="street" id="street" class="form-control" required/>

            <div class="help-block with-errors"></div>
        </div>


    </div>
    </div>
    <button type="submit" name="add" value="add"class="bouton-contact">سجل</button>

        </div>
</form>
<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="validator.min.js"></script>

</body>
</html>