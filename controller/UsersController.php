<?php
session_start();
class User{
    public $id;
    public $first_name;
    public $second_name;
    public $username;
    public $password;
    public $gender;
    public $type;

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

    function register(){

        $username=mysqli_real_escape_string(self::$conn,$this->username);
        $query="select * from users where username='$username'" ;
        $result=mysqli_query(self::$conn,$query);

        if(mysqli_num_rows($result)>0)
        {
            $_SESSION['error']='اسم المستخدم موجود بالفعل استحدم اسم اخر او سجل الدخول.';
            header('Location: ../register.php');
            exit;
        }
        else {
            $first_name=mysqli_real_escape_string(self::$conn,$this->first_name);
            $second_name=mysqli_real_escape_string(self::$conn,$this->second_name);
            $gender=mysqli_real_escape_string(self::$conn,$this->gender);
            $password=mysqli_real_escape_string(self::$conn,$this->password);
            $password=password_hash($password, PASSWORD_DEFAULT);
            $type="1";

            $query="insert into users set first_name='$first_name',second_name='$second_name',username='$username',gender='$gender' ,type='$type', password='$password'";
            mysqli_query(self::$conn,$query);

            if(mysqli_errno(self::$conn))
                die(mysqli_error(self::$conn));
            $user_id=mysqli_insert_id(self::$conn);
            $_SESSION['user_id']=$user_id;
            $_SESSION['user_name']=$username;
           header('Location: ../index.php');
            exit;
        }

    }

    function login(){
        $username=mysqli_real_escape_string(self::$conn,$this->username);
        $password=mysqli_real_escape_string(self::$conn,$this->password);
        $query="select * from users where username='$username'" ;
        $result=mysqli_query(self::$conn,$query);

        if(mysqli_num_rows($result)>0)
        {
            while ($rows=mysqli_fetch_array($result))
            {
                if(password_verify($password,$rows["password"]))
                {
                    $_SESSION['user_name']=$username;

                    /*if(isset($_POST['remember_me']))
                    {
                        setcookie('user_id',$user['id'],time()+60*60*24*5);
                        setcookie('user_name',$user['username'],time()+60*60*24*5);
                    }*/
                    header('Location: ../index.php');
                }
                else{
                    $_SESSION['error']='كلمة المرور خطأ.';
                    header('Location: ../login.php');
                    exit;
                }
            }



            exit;

        }

    }

    function update(){}

    function display(){
        $username=mysqli_real_escape_string(self::$conn,$_SESSION['user_name']);

        $query="select * from users where username='$username'";

        $result=mysqli_query(self::$conn,$query);
        return $result;
    }



  }