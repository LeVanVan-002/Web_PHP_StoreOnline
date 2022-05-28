  
  <section id="examples" class="text-center">
     
      <div class="row">
            <?php
            $hh=new ITEMS();
            $results=$hh->getListHangHoaAll();
            while($set=$results->fetch()):
            ?>
              <div class="col-lg-3 col-md-4 mb-3 text-left">
                  <div class="view overlay z-depth-1-half">
                      <img src="<?php echo 'Content/image2/'.$set['hinh'];?>"  class="img-fluid" alt="">
                      <div class="mask rgba-white-slight"></div>
                  </div>
                  <h5 class="my-4 font-weight-bold" style="color: red;"><?php echo number_format($set['dongia']);?><sup><u>vnđ</u></sup></br>
                  </h5>
                  <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh'];?>">
                      <span><?php echo $set['tenhh'].'-'.$set['tuyvi'];?></span></br></a>
                  <button class="btn btn-info" id="may4" value="lap 4">drink</button> <button class="btn btn-warning" >
                      <a href="index.php?action=home&act=detail&id=<?php echo $set['mahh'];?>" style="color:red">Order Ngay</a></button>
                  <h5 style="color: #0000FF; ">Số lượt order:<span class="badge badge-danger"><?php echo $set['soluotxem'];?></span></h5>
              </div>
            <?php
            endwhile;
            ?>
      </div>
  </section>
  