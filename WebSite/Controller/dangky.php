<?php
$action="dangky";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "dangky":
        include 'View/dangky.php';
        break;
    case "dangky_action":
       $u= null;
        if($u==!true)
        {
        $tenkh=$_POST['txttenkh'];
        $username=$_POST['txtusername'];
        $password=$_POST['txtpass'];
        $crypt=md5($password);
        $email=$_POST['txtemail'];
        $diachi=$_POST['txtdiachi'];
        $dt=$_POST['txtsodt'];
        $u=new User();
        $u->InsertUser1($tenkh,$username,$crypt,$email,$diachi,$dt);
        echo '<script> alert("Đăng Ký Tài Khoản Thành Công ,Vui Lòng Đăng Nhập !")</script>';
        include 'View/dangnhap.php';
    }
    else {
        echo'<script> alert("bạn phải điền đầy đủ thông tin đăng ký !");</script>';
        include 'View/dangky.php';
    }
        break;
}
?>