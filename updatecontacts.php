
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
<h1>تحديث  </h1>


<form id="RForm"   method="post"   action="Rform.php" role="form" enctype="multipart/form-data">

    <h1>: تحديث  البيانات  </h1>

    <div class="contentform">

        <div class="alert alert-danger text-right">
    jjjjjjj <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
</div>
        <div class="alert alert-success text-right">
            jjjjjjj <i class="fa fa-info-circle" aria-hidden="true"></i>
</div>


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
                <input type="email" name="email"   id="username" class="form-control" required/></textarea>
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
            <p>العنوان  <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="street" id="street" class="form-control" required/>

            <div class="help-block with-errors"></div>
        </div>


    </div>
    </div>
    <button type="submit" name="add" value="send"class="bouton-contact">تحديث</button>

        </div>
</form>
<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="validator.min.js"></script>

</body>
</html>