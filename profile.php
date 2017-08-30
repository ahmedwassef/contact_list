
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
<h1> <?= $_SESSION['user_name']?></h1>

<?php
@require_once('controller/UsersController.php');

$user= new User();
$result=$user->display();
while ($row = mysqli_fetch_array($result)) {
$first_name=$row["first_name"];
$second_name=$row["second_name"];
$username= $_SESSION['user_name'];
$gender= $row["gender"];
}

?>
<form id="RForm"   method="post"   action=""  role="form" enctype="multipart/form-data"/ >


    <div class="contentform">

<!--<div class="alert alert-danger text-right">
    jjjjjjj <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
</div>
<div class="alert alert-success text-right">
    jjjjjjj <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
</div>!-->

        <div class="form-group">
            <p>الاسم الأول <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="prenom" value="<?= $first_name ?>" class="form-control" id="prenom" data-error="ادخل الاسم من فضلك  لا يقل عن 15 حرف"required/>
            <br>
            <br>
            <br>
            <p>اللقب <span>*</span></p>
            <span class="icon-case"><i class="fa fa-user"></i></span>
            <input type="text" name="secnom" id="secnom"  value="<?= $second_name ?>" class="form-control"  data-error="ادخل الاسم من فضلك  لا يقل عن 15 حرف"required/>
            <br>
            <br>
            <div class="help-block with-errors"></div>
        </div>

        <div class="form-group">
                <p>اسم المستخدم  <span>*</span></p>
                <span class="icon-case"><i class="fa fa-user"></i></span>
                <input type="text" name="username"  value="<?= $username ?>" id="username"  class="form-control" required/>
                <div class="help-block with-errors"></div>
            </div>
     

        <div class="form-group">
            <p>الجنس  <span>*</span></p>
            <div class="radio">
                <? if($gender=='on')
                { echo "
                <label><input type='radio' name='optradio' checked>ذكر</label>
            </div>
            <div class='radio'>
                <label><input type='radio' name='optradio'> انتثي</label>
            </div>
              </div>";}
                   else{($gender=='s')
                    echo "
                <label><input type='radio' name='optradio' >ذكر</label>
            </div>
            <div class='radio'>
                <label><input type='radio' name='optradio' checked> انتثي</label>
            </div>
              </div>";}
                ?>


        </div>
    </div>
    <button type="submit" name="update" value="update"class="bouton-contact">تحديث البيانات</button>

        </div>
</form>
<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="validator.min.js"></script>

</body>
</html>