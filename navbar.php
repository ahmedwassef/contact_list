
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
?>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header text-left">
            <a class="navbar-brand" href="index.php" style="padding: 10px">بطاقات التواصل</a>
        </div>
        <ul class="nav navbar-nav" style="float: right">
            <?php
            if(!isset($_SESSION['user_name']))  // loged out
            {
                echo'<li><a href="login.php">تسجيل الدخول</a></li>';
                echo '<li><a href="register.php">التسجيل</a></li>';
            }
            else //loged in
            {
                echo '<li><a href="profile.php">'.$_SESSION['user_name'].' مرحبا </a></li>';
                echo '<li><a href="controller/logout.php">تسجيل الخروج</a></li>';
            }
            ?>

        </ul>
    </div>
</nav>

<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="validator.min.js"></script>

</body>
</html>