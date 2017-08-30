<?php
session_start();
class Contact{
    public $id;
    public $name;
    public $email;
    public $username;
    public $mobile;
    public $country;
    public $city;
    public $street;

    static private $conn=null;
    function __construct($id=-1)
    {
        if(!self::$conn)
        {
            self::$conn=mysqli_connect('localhost','root','','emp');
        }
        if ($id !=-1)
        {
            $query='select * from users where id=$id limit 1';
            $result=mysqli_query(self::$conn,$query);
            $user=mysqli_fetch_assco($result);
            $this->id=$user['id'];
            $this->first_name=$user['first_name'];
            $this->second_name=$user['second_name'];
            $this->username=$user['username'];
            $this->gender=$user['gender'];
            $this->password=$user['password'];
            $this->type=$user['type'];

        }
    }

    function add(){
        $username=mysqli_real_escape_string(self::$conn,$this->username);
        $name=mysqli_real_escape_string(self::$conn,$this->name);
        $email=mysqli_real_escape_string(self::$conn,$this->email);
        $mobile=mysqli_real_escape_string(self::$conn,$this->mobile);
        $country=mysqli_real_escape_string(self::$conn,$this->country);
        $city=mysqli_real_escape_string(self::$conn,$this->city);
        $street=mysqli_real_escape_string(self::$conn,$this->street);

        $query="insert into contacts set name='$name',email='$email',username='$username',mobile='$mobile' ,country='$country',city='$city',street='$street'";
        mysqli_query(self::$conn,$query);
        if(mysqli_errno(self::$conn))
        {
            $_SESSION['error']=mysqli_error(self::$conn);
            header('Location: ../newcontacts.php');
            exit;
        }
        $user_id=mysqli_insert_id(self::$conn);
        $_SESSION['user_id']=$user_id;
        $_SESSION['user_name']=$username;
        $_SESSION['success']='تمت الاضافة بنجاح .';
        header('Location: ../newcontacts.php');
        exit;

        }



    function display(){
        $username=mysqli_real_escape_string(self::$conn,$_SESSION['user_name']);
        $query="select * from contacts WHERE  username ='$username' order by contacts.id desc;";
        $result=mysqli_query(self::$conn,$query);
        if(mysqli_errno(self::$conn))
            die(mysqli_error(self::$conn));

         return $result;


    }

    function delete($id)
    {

        $id=$id;
        $query = "DELETE FROM contacts WHERE id='$id'";
        $result=mysqli_query(self::$conn,$query);
        if(mysqli_errno(self::$conn))
        {
            $_SESSION['error']=mysqli_error(self::$conn);
            header('Location: ../index.php');
            exit;
        }
        $_SESSION['success']='تمت الحزف بنجاح .';
        header('Location: ../index.php');
        exit;

    }




}