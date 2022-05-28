<style>
    .btnn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
</style>
<script>
      window.alert("Cảm Ơn Bạn Đã mua hàng của chúng tôi ");
  </script>
<div class="table-responsive">
 <?php
 if(!isset($_SESSION['makh'])|| count($_SESSION['cart'])==0):
  echo '<script> alert("Bạn chưa đăng nhập");</script>';
  include "View/dangnhap.php";
 ?>
<?php
else:
?>
    <form action="" method="post">
      <table class="table table-bordered" border="0">
      <?php
       $hd=new RECEIPT();
      if(isset($_SESSION['sohd']))
      {
        $result=$hd->getOrder($_SESSION['sohd']);
        $sohd= $result[0];
        $tenkh=$result[1];
        $ngaydat=$result[2];
        $diachi=$result[3];
        $sodt=$result[4];
        $date=new DateTime($ngaydat);
        $ngay=$date->format("d/m/Y");
      }
      ?>
            <tr>
                <td colspan="4">
                    <h2 style="color: red;">Xác Minh | Thanh Toán Hóa Đơn Của Bạn </h2>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h7 style="color: red;">Số Hóa Đơn : </h7><?php echo  $sohd;?>
                </td>
                <td colspan="2">
                    <h7 >Ngày : <?php echo  $ngay;?></h7> 
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h7 style="color: red;">Họ và Tên Khách Hàng : </h7>
                </td>
                <td colspan="2"> <h7 style="color: red  ;"><?php echo  $tenkh;?></h7></td>
            </tr>
            <tr>
                <td colspan="2">
                    <h7 style="color: red;">Địa chỉ Nhận Hàng : </h7>
                </td>
                <td colspan="2"><?php echo  $diachi;?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <h7 style="color: red;">Số điện thoại Liên Hệ : </h7>
                </td>
                <td colspan="2"><?php echo  $sodt;?></td>
            </tr>
        </table>
        <table class="table table-bordered">
            <thead>

                <tr class="table-success">
                    <th>Số TT</th>
                    <th>Thông Tin Sản Phẩm</th>
                    <th>Tùy Chọn Của Bạn</th>
                    <th>Giá </th>
                </tr>
            </thead>
            <tbody>
                <?php
             $z=0;
             $result=$hd->getOrderDetail($_SESSION['sohd']);
             while($set=$result->fetch()):
               $z++;
             ?>
                <tr>
                    <td><?php echo $z;?></td>
                    <td>
                        <h7 style="color: red;">Tên SP : </h7> <?php echo $set['tenhh'];?>
                    </td>
                    <td>
                        <h7 style="color: red;">Tùy Vị Của Bạn : </h7> <?php echo $set['tuyvi'];?>
                    </td>
                    <td>
                        <h7 style="color: red;">Đơn Giá : </h7> <?php echo $set['dongia'];?> <h7 style="color: red;"> Số
                            Lượng : </h7> <?php echo $set['soluongmua'];?> <br />
                    </td>
                </tr>
                <?php
             endwhile;
             ?>
                <tr>
                    <td colspan="3">
                        <b style="color: blue;">Tổng Tiền Thanh Toán (đã cộng tiền ship Hàng ) </b>
                    </td>
                    <td style="float: right;">
                        <b> <?php echo traveTong();?> <sup><u>vnđ</u></sup></b>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
    <?php
   endif;
   ?>
   <hr>
   <tr>
    <td>
        <h3> Cảm Ơn Bạn Đã Mua Hàng Của Chúng Tôi ,Đơn Vị Shipper Sẽ Giao Hàng Tới Địa Chỉ :
        <u style="color: red ; "> <?php echo  $diachi;?> </u> Nhanh Nhất , Hãy Chuẩn Bị Đủ Số Tiền Thanh Toán (<u style="color: red;"><?php echo traveTong();?></u>) </h3> 
    </td>
    </tr>
    <hr>
    <form action="">
    <tr>
        <td>
        <input  href="" type="submit" value=">>>Quay Lại Trang Chủ<<<" class="btnn">
        </td>
    </tr>
    </form> 
</div>
</div>
