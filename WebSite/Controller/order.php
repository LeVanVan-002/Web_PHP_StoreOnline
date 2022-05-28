<?php
$action="order";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch($action)
{
    case "order":
        include "View/order.php";
        break;
    case "order_detail":
        $hd=new RECEIPT();
        $sohdid=$hd->insertOrder($_SESSION['makh']);
        $_SESSION['sohd']=$sohdid;
        $total=0;
        foreach($_SESSION['cart'] as $key=>$item)
        {
            $hd->insertOrderDetail($sohdid,$item['mahh'],$item['qty'],$item['vi'],$item['total']);
            $total+=$item['total'];
        }
        $hd->updateOrderTotal($sohdid,$total);
        include 'View/order.php';
        break;
}
?>