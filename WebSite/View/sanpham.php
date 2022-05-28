  <?php
  include "quangcao.php";
  ?>
  <?php
  ?>
 <?php
    if(isset($_GET["act"]))
    {
        if($_GET["act"]=="sanpham")
        {
            $ac=1;
        }
        elseif($_GET["act"]=="khuyenmai")
        {
            $ac=2;
        }
        elseif($_GET["act"]=="timkiem")
        {
            $ac=3;
        }
        else{
            $ac=0;
        }
    }
 ?>
  <section id="examples" class="text-center">
      <div class="row">
          <div class="col-lg-8 text-right">
             <?php
             if($ac==1)
             {
                
             }
             elseif($ac==2)
             {
                 echo ' <h3 class="mb-5 font-weight-bold"></h3>';
             }
             elseif($ac==3)
             {
                echo ' <h3 class="mb-5 font-weight-bold"></h3>';
            }
             ?>
          </div>
      </div>
      <div class="row">
         <?php
            $hh=new ITEMS();
            if($ac==1)
            {
                $results=$hh->getListHangHoaNew();
            }
            elseif($ac==2)
            {
                $results=$hh->getListHangHoaSaleAll();
            }
            elseif($ac==3)
            {
                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                    $timkiem=$_POST['txtsearch'];
                    echo "Kết Quả Của Tìm Kiếm $timkiem  ";
                }
                $results=$hh->getSearch($timkiem);
            }
            while($set=$results->fetch()):
         ?>
              <div class="col-lg-3 col-md-4 mb-3 text-left">

                  <div class="view overlay z-depth-1-half">
                      <img src="<?php echo 'Content/image2/'.$set['hinh'];?>" class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>
                    <?php
                    if($ac==2){
                        echo '<h5 class="my-4 font-weight-bold">Giảm Còn :
                        <font color="red">'.number_format($set['giamgia']).'<sup><u>vnđ</u></sup></font>
                        <strike>'.number_format($set['dongia']).'</strike><sup><u>vnđ</u></sup>
                        </h5>';
                    }
                    else{
                        echo '<h5 class="my-4 font-weight-bold" style="color: red;">'.number_format($set['dongia']).'<sup><u>vnđ</u></sup></br>';
                    }
                    ?>
                  </h5>
                  <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh'];?>">
                      <span><?php echo $set['tenhh'].'-'.$set['tuyvi'];?></span></br></a>
                  <button class="btn btn-info" id="may4" value="lap 4">drink</button>
                  <button class="btn btn-warning" >
                      <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh'];?>" style="color:red">Order Ngay</a></button>
                  <h5 style="color: #0000FF; ">Số lượt order:<span class="badge badge-danger"><?php echo $set['soluotxem'];?></span></h5>
              </div>
        <?php
        endwhile;
        ?>
      </div>
  </section>
  
 
  