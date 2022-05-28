<?php
$action="home";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action){
    case "home":
        include 'View/home.php';
        break;
    case "sanpham":
        include 'View/sanpham.php';
        break;
    case "khuyenmai":
        include 'View/sanpham.php';
        break;
    case "detail":
        include 'View/chitiet.php';
        break;
        case "comment":
            $makh=$_SESSION['makh'] ;
            $mahh=$_POST['txtmahh'];
            $noidung=$_POST['comment'];
            $u=new User();
            $u->insertComment($mahh,$makh,$noidung);
            include 'View/chitiet.php';
            break;
            case "timkiem" :
                include "View/sanpham.php";
                break;
}
?>