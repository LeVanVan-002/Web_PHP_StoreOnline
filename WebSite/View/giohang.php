
<div class="table-responsive">
  <?php
if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0):
  echo '<script> alert ("giỏ hàng chưa có gì ,tiếp tục mua hàng "); </script>';
 include "home.php";
  ?>
  <?php
else : 
  ?>
    <form action="index.php?action=giohang&act=update_cart" method="post">
      <table class="table table-bordered">
        <thead>
        <marquee style="border:rgb(42, 42, 204) 2px SOLID">
					<h3 class="mau">Vui Lòng Thanh Toán Giỏ Hàng Của Bạn </h3>
				</marquee><br />
          <tr class="table-secondary">
            <th>Số thứ tự </th>
            <th>Thông Tin Sản Phẩm Của bạn</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá Tiền Sản Phẩm</th>
          </tr>
        </thead>
        <tbody>
        <?php
        $j=0 ;
         foreach ($_SESSION['cart'] as $key=>$item):
          $cost=number_format($item['cost'],0);
          $total=number_format($item['total'],0);
          $j++;
        ?>
            <tr>  
              <td><?php echo $j ;?></td>
              <td><img width="50px" height="50px" src="Content/image2/<?php echo $item['hinh'] ;?>"> <h7 style="color: blue;">ĐỒ UỐNG :</h7><?php echo $item['name'] ; ?></td>
              <td><h7 style="color: red;">Tùy Chọn của bạn : </h7> <?php echo $item ['vi'];?> </td>
              <td>
              <h7 style="color: red;">
              Đơn Giá :</h7><?php echo $cost;?> <sup><u>vnđ</u></sup>
              <h7 style="color: red;"> Số Lượng :</h7>
               <input type="number" name="newqty[<?php echo $item['mahh'] ?>]" value="<?php echo $item['qty'] ;?>" />
               <br />
               <p style="float: right;">Thành Tiền :<h7 style="color: red;"> <?php echo $total ;?> </h7><sup><u>vnđ</u></sup></p>
              </td>
              <td>
                <a href="index.php?action=giohang&act=emty_cart&id=<?php echo $item['mahh'] ?>"><button type="button" class="btn btn-warning">Xóa khỏi Cart</button></a>
                <button type="submit" class="btn btn-success">Sửa Cart </button>
              </td>
            </tr>
        <?php
        endforeach;
        ?>
          <tr>
            <td colspan="3">
              <b>Tổng  Số Tiền Mà Bạn phải thanh toán <h7 style="color: red;">(Đã Cộng Tiền ship Hàng 25,000 vnđ )</h7></b>
            </td>
            <td style="float: right;">
              <b>+ 25,000 =  <?php echo traveTong(); ?> <sup><u>vnđ</u></sup></b>
            </td>
            <td><a href="index.php?action=order&act=order_detail">Thanh Toán Ngay</a></td>
          </tr>
        </tbody>
      </table>
    </form>
    <?php
endif;
?>
</div>
</div>
