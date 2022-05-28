<?php
$action="giohang";
if(!isset($_SESSION['cart']))
{
    $_SESSION['cart']=array();
}
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action) {
    case "giohang":
        include "View/giohang.php";
        break;
        case "add_cart":
            $mahh=$_POST['mahh'];
            $mausac=$_POST['myvi'];
            $soluong=$_POST['soluong'];
            add_item($mahh,$soluong,$tuyvi,) ;
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';  
            break ;
           case "emty_cart":
            if(isset($_GET['id']))
            {
                $key=$_GET['id'];
                unset($_SESSION['cart'][$key]);
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';  
            }
            break ;
            case "update_cart":
                $soluongnew=$_POST['newqty'];
                foreach($soluongnew as $key => $qty)
                {
                    if($_SESSION['cart'][$key]['qty'] != $qty)
                    {
                        update_item($key,$qty);
                    }
                }
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=giohang&act=giohang"/>';  
                break ;
}
?>