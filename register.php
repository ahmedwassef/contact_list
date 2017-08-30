
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
<h1>التسجيل </h1>


<form id="RForm"   method="post"   action="controller/RegisterController.php" role="form" enctype="multipart/form-data">

    <h1>: من فضلك املئ البيانات التالية بصورة صحيحة للتسجيل  </h1>

    <div class="contentform">
<?php
if(isset($_SESSION['error']))
{
    echo " <div class='alert alert-danger text-right'>" .$_SESSION['error']. "<i class='fa fa-exclamation-triangle' ></i></div>";
    unset($_SESSION['error']);
}
?>

            <div class="form-group">
                <p>الاسم الأول <span>*</span></p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input type="text" name="prenom"  class="form-control"id="prenom"required/>
                <br>
                <br>
                <br>
                <p>اللقب <span>*</span></p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input type="text" name="secnom" id="secnom"  class="form-control" required/>
                <br>
                <br>
                <div class="help-block with-errors"></div>
            </div>

        <div class="form-group">
            <p>اسم المستخدم  <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="username"  class="form-control"id="username"required/>

            <div class="help-block with-errors"></div>
        </div>



            <div class="form-group">
                <p>الجنس  <span>*</span></p>
                <div class="radio">
                    <label><input type="radio" name="optradio">ذكر</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="optradio"> انتثي</label>
                </div>
                </div>

            <div class="form-group">

                <p>كلمة المرور  <span>*</span></p>
                <span class="icon-case"><i class="fa fa-pencil"></i></span>
                <input type="password" name="pass"  rows="5" id="pass" class="form-control" placeholder=" ادخل كلمة المرور هنا من فضلك" required/></textarea>
                <br>
                <br>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">

                <p> تاكيد كلمة المرور  <span>*</span></p>
                <span class="icon-case"><i class="fa fa-pencil"></i></span>
                <input type="password" name="repass"  rows="5" id="repass" class="form-control" placeholder=" ادخل كلمة المرور هنا من فضلك" required/></textarea>
                <br>
                <br>
                <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">

                <p>  أكتب <?php
                    $cap = 'aS8hC9-o';
                    $cap = str_shuffle($cap);
                    echo $cap;

                    ?> <span>*</span></p>
                <span class="icon-case"><i class="fa fa-pencil"></i></span>
                <input type="text" name="cap"  rows="5"  class="form-control hidden"   value="<?php echo $cap;?>" hidden  >
                <input type="text" name="test"  rows="5" id="test" class="form-control" placeholder="ادخل الناتج" required/>
                <br>

                <div class="help-block with-errors"></div>
            </div>

        </div>
    </div>
    <button type="submit" name="register" value="register"class="bouton-contact">سجل</button>

        </div>
</form>
<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="validator.min.js"></script>

</body>
</html>