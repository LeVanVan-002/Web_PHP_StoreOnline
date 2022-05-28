<?php
function add_item($mah,$quantity,$mytuyvi) 
{
    $pros=new ITEMS();
    $pro=$pros->getListDetail($mah);
    if(isset($_SESSION['cart'][$mah]))
    {
        $quantity+=$_SESSION['cart'][$mah]['qty'];
        update_item($mah,$quantity);
        return;
    }
    $cost=$pro['dongia'];
    $ten=$pro['tenhh'];
    $hinh=$pro['hinh'];
    $total=$cost*$quantity;
    $item=array(
        'mahh'=>$mah,
        'hinh'=>$hinh,
        'name'=>$ten,
        'vi'=>$mytuyvi,
        'cost'=>$cost,
        'qty'=>$quantity,
        'total'=>$total,
    );
    $_SESSION['cart'][$mah]=$item;
}
function traveTong()    
 {
      $subtotal=25000 ; 
     foreach($_SESSION['cart'] as $item)
      {
        $subtotal+=$item['total'];
     }
     $subtotal=number_format($subtotal,0);
     return $subtotal;
 }
 function update_item($mahh,$quantity)
 {
     if($quantity<=0)
     {
        unset($_SESSION['cart'][$mahh]);
     }
     else
     {
      $_SESSION['cart'][$mahh]['qty']=$quantity;
      $totalnew=$_SESSION['cart'][$mahh]['qty']*$_SESSION['cart'][$mahh]['cost'];
      $_SESSION['cart'][$mahh]['total']=$totalnew;
     }
} 
?>