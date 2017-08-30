
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
<h1> قائمة الأرقام </h1>


<div class="wrapper">


     <div class=" btn-add text-center">
        <a href="newcontacts.php"> <button class="bt btn-success"> <i class="fa fa-plus"></i> اضافة جديد</button></a>
     </div>


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

            <table class="table table-fixed">


                <?php
                @require_once('controller/ContactsController.php');
                $display=new Contact();
                $result=$display->display();
                if(mysqli_num_rows($result)> 0)

                {
                    echo "
                <thead>
                <tr>
                    <th class='col-xs-3'> Name</th>
                    <th class='col-xs-2'>Mobile</th>
                    <th class='col-xs-2'>E-mail</th>
                    <th class='col-xs-3'>Address</th>
                    <th class='col-xs-2'>Action</th>

                </tr>
                </thead>";
                    for ($i=0; $i < mysqli_num_rows($result); $i++) {
                    $post=mysqli_fetch_assoc($result);

                    echo "<tr>";
                    echo "<td class='col-xs-3'>".$post['name']."</td>";
                    echo "<td class='col-xs-2'>".$post['mobile']."</td>";
                    echo "<td class='col-xs-2'>".$post['email']."</td>";
                    echo "<td class='col-xs-3'>".$post['country'].','.$post['city'].','.$post['street'].'.street'."</td>";
                    echo"<th class='col-xs-2'><a href='controller/delete.php?action=delete&id=".$post['id']."' <button class='btn btn-danger'> <i class='fa fa-close''></i> حذف </button></a></th>";

                    echo "</tr>";


                    }

                }
                else{
                    echo "<div class='alert alert-info text-right'>  لا يوجد بيانات </div>";
                }
                ?>

            </table>
        </div>

</div>


<script src="js/jquery-1.11.1.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
 <script src="validator.min.js"></script>

</body>
</html>