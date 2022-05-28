<?php
$action="dangnhap";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action){
    case "dangnhap":
        include 'View/dangnhap.php';
        break;
    case "dangnhap_action":
        // truyền qua đây là tên admin, pass
        $user=$_POST['txtusername'];//admin
        $pass=$_POST['txtpassword'];//123456
        $dn=new DangNhap();
        $result=$dn->logAdmin($user,$pass);// $result[admin,123456]
        if($result!=false)
        {
            $_SESSION['admin']=$result[0];//admin
            echo'<script> alert("Đăng nhập thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=hanghoa&act=hanghoa"/>';
        }
        else{
            echo'<script> alert("Vui lòng xem lại Mk hoặc tên đăng nhập !");</script>';
            include "View/dangnhap.php";
        }
        break;
        case "dangxuat":
            if(isset($_SESSION['admin']))
            {
                unset($_SESSION['admin']);
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php"/>';  
            break;
}
?>