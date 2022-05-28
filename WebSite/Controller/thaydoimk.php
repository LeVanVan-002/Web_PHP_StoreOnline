<?php
$action="thaydoimk";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "thaydoimk":
        include 'View/thaydoimk.php';
        break;
        case "thaydoimk_action":
        $username=$_POST['txtusername'];
        $password_cu=$_POST['txtpassword_cu'];
        $password_moi=$_POST['txtpassword_moi'];
        
         echo '<script> alert("Bạn đã Thay đổi mk thành công  ");</script>';
         echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home&act=home"/>';  
        }
?>