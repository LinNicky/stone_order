<?php 
include('dbConnection.php');
include('stock.php');
if($_GET['op']=='createOrder')
{
    createOrder();
}
if($_GET['op']=='checkLogin')
{
    checkLogin($_POST['email'],$_POST['password']);
}
if($_GET['op']=='logout')
{
   logout();
}
if($_GET['op']=='register')
{
    register();
}
if($_GET['op']=='login')
{
    login();
}
function logout(){
    session_start();
    session_destroy();
    header("Location: /tttt.php");
}
function checkLogin($email,$password){
    if(!isset($_SESSION)){
        session_start();
        }  //判斷session是否已啟動

    $staffEmail="haha@gmail.com";
    $staffPassword="password";
    if($email==$staffEmail&&$password==$staffPassword){
        session_start();
        $_SESSION['email']=$_POST['email'];
        $_SESSION['password']=$_POST['password'];
        header("Location: /allOrder.php");
    }
    else{
        header("Location:/login.php");      
    }
}
function createOrder(){
    if(!isset($_SESSION)){
        session_start();
        }  //判斷session是否已啟動

    /*echo $_POST['gem_id']."<br>";
    echo $_POST['name']."<br>";
    echo $_POST['email']."<br>";
    echo $_POST['quantity']."<br>";
    echo date('Y-m-d H:i:s')."<br>";*/
    global $dbConnection;

    $sql="INSERT INTO `order`(
        `client_name`,
        `client_email`,
        `quantity`,
        `order_time`,
        `gam_id`
        )VALUES(
        '{$_POST['name']}',
        '{$_POST['email']}',
         {$_POST['quantity']},
        '".date('Y-m-d H:i:s')."',
        {$_POST['gem_id']})";

    if(mysqli_query($dbConnection ,$sql)){
        header("Location: /order-completed.php");
    }else{
        header("Location: /tttt.php");
    }
    //儲存資料
    /*$myfile = fopen("data.csv","a")or die("未能開啟檔案");
    $data= $_POST['gem_id'].','.$_POST['name'].','.$_POST['email'].','.$_POST['quantity'].','.date('Y-m-d H:i:s')."\r\n";
    fwrite($myfile,$data);
    fclose($myfile);*/
    //轉變頁面
    
}
/*$sql="INSERT INTO `order`(
    `client_name`,
    `client_email`,
    `quantity`,
    `order_time`,
    `gem_id`
    )VALUES(
    '{$_POST['name']}',
    '{$_POST['email']}',
     {$_POST['quantity']},
    '".date('Y-m-d H:i:s')."',
    {$_POST['gem_id']})";*/
function register(){
    global $dbConnection;
    if(!isset($_SESSION)){
        session_start();
        }  //判斷session是否已啟動

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $email=$_POST["email"];
        //檢查帳號是否重複
        $check="SELECT * FROM `login` WHERE `email`='".$email."'";
        if((!empty($_SESSION['check_word'])) && (!empty($_POST['checkword']))){  //判斷此兩個變數是否為空
        
            if($_SESSION['check_word'] == $_POST['checkword']){
                
                 $_SESSION['check_word'] = ''; //比對正確後，清空將check_word值
                if(mysqli_num_rows(mysqli_query($dbConnection,$check))==0){
                    $sql="INSERT INTO `login`(
                        `name`,
                        `email`,
                        `password`
                        )VALUES(
                        '{$_POST['name']}',
                        '{$_POST['email']}',
                        '{$_POST['password']}')";
                
                    if(mysqli_query($dbConnection ,$sql)){
                        session_destroy();
                        echo "註冊成功!2秒後將自動跳轉頁面<br>";
                        echo "<a href='login2.php'>未成功跳轉頁面請點擊此</a>";
                        header("refresh:2;url=login2.php");
                    }else{
                        session_destroy();
                        echo "Error" . mysqli_error($dbConnection);
                    }
                }
                else{
                    session_destroy();
                    echo "<script>alert('該帳號已有人使用!');</script>";
                    header("refresh:0;url=register.php");
                }
            }else{
            echo "<script>alert('驗證碼錯誤');</script>";
            header("refresh:0;url=register.php");
            }
        }
    }
}

function login(){
    global $dbConnection;
    $email=$_POST["email"];
    $password=$_POST["password"];
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $sql = "SELECT * FROM `login` WHERE `email`='".$email."'";
        $result=mysqli_query($dbConnection,$sql);
        if(mysqli_num_rows($result)==1 && $password==mysqli_fetch_assoc($result)["password"]){
            $dd="SELECT `name` FROM `login` WHERE `email`='".$email."'";
            $re=mysqli_query($dbConnection,$dd);
            $rr=mysqli_fetch_assoc($re)["name"];
            session_start();
            $_SESSION['email']=$_POST['email'];
            //$_SESSION["name"] = mysqli_fetch_assoc($result)["name"];
            $_SESSION["name"]=$rr;
            header("location:tttt.php");
        }else{
            echo "<script>alert('帳號或密碼錯誤');</script>";
            header("refresh:0;url=login2.php");
            }
    }
}

?>