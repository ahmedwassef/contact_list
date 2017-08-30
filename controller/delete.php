<?php
require_once 'ContactsController.php';

if(!isset($_SESSION['user_name']))
{
    header('Location: login.php');
    exit;
}
if(($_GET['action'] == 'delete') && isset($_GET['id']))
{
    $id1=$_GET['id'];

    $deleted_user = new Contact();
    $deleted_user->delete($id1);
}
else{
    $_SESSION['error']='حدثت بعض  المشاكل .';
    header('Location: ../index.php');
    exit;
}