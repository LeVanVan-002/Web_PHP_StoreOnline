<body>
    <div class="container" style=" margin-top: 50px;">
        <header class="row">
            <div class="col-sm-7 shopping-mall">
                <h1 style="color: red;">Công Ty CNHH 3 Thành Viên </h1>
                <form onsubmit="submitFn(this, event);" action="index.php?action=home&act=timkiem" method="post" >
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input  type="text" name="txtsearch" class="search-input" placeholder="Bạn tìm gì !!!" />
                            <button name="submit" type="submit" id="btsearch" class="search-icon" onclick="searchToggle(this, event);" ><span></span></button>
                        </div>
                        <span class="close" onclick="searchToggle(this, event);"></span>
                    </div>
                </form>
            </div>
            <div class="col-sm-5">
                <img src="./Content/image/header.jpg" alt="">
            </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php"><span class="glyphicon glyphicon-home"> Trang-chủ
                            </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/HTcaffe/"><span class="glyphicon glyphicon-th-list"> Giới-thiệu </span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-earphone"></span>Liên-Hệ-NV</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="https://www.facebook.com/profile.php?id=100029141000792"><h7 style="color: blue;" > FB :</h7>Trần Thị Ngọc Ánh </a>
                            <a class="dropdown-item" href="https://www.facebook.com/l.v.van009/"><h7 style="color: blue;" > FB :</h7>Lê Văn Văn</a>
                            <a class="dropdown-item" href="#"><h7 style="color: blue;" > FB :</h7>Nguyễn Hoàng Châu </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?action=gopy"><span class="glyphicon glyphicon-envelope"> Góp-ý </span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="glyphicon glyphicon-question-sign"> Hỏi-Đáp
                            </span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-user"></span>Tài-khoản</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="index.php?action=dangky" > Đăng Ký </a>
                            <a class="dropdown-item"  href="index.php?action=dangnhap" >Đăng Nhập</a>
                            <a class="dropdown-item"  href="./Admin/index.php" >Đăng Nhập với Admin</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="index.php?action=dangnhap&act=dangxuat" onclick=" Hoidap() ; return false ;">Đăng Xuất</a>
                            <a class="dropdown-item" href="index.php?action=thaydoimk">Đổi Mật Khẩu</a>
                            <a class="dropdown-item" href="#">Cập Nhật Hồ Sơ</a>
                        </div>
                    </li>
                </ul>
                
            </div>
            <ul class="navbar-nav reverser" >
            <li class="nav-item" >
                   <a href="index.php?action=giohang" class="nav-link"><i class="fa fa-shopping-cart" style="font-size:28px;color:white"></i></a>
               </li>
               <li>
                  <?php
                    if(isset($_SESSION['cart']))
                       {
                        $dem=count($_SESSION['cart']);
                        }
                       else
                         {
                             $dem=0;
                          }
                   ?>
                        <p style="color: white; margin-top: 20px; margin-left: 0px;">(<?php echo $dem  ; ?>)    </p>

                </li>
                     <?php
                         if(isset($_SESSION['makh'])&& isset($_SESSION['tenkh'])):
                             $name=$_SESSION['tenkh'];   
                      ?>
                           <p style="color: aqua; margin-top: 20px; margin-left: 0px;"><?php echo " Tài Khoản : ".$name; ?></p>
                       <?php
                          else:
                             echo'<p style="color: red; margin-top: 20px; margin-left: 0px;">  Vui Lòng Đăng Nhập/Đăng Ký !  </p>';
                        ?>
                         <?php
                           endif;
                            ?>
                </li>
            </ul>
        </nav>
        <div class="row">
            <aside class="col-sm-3">
                <div class="card poly-cart">
                    <div class="card-header" style="cursor: pointer ;">
                        <span class="glyphicon glyphicon-th-list"> Danh mục</span>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="index.php?action=home&act=sanpham"> <span> Đồ Uống | Sinh Tố 
                                </span></a></li>
                        <li class="list-group-item"> <a href="index.php?action=home&act=khuyenmai"> <span>Đồ Uống Khuyến
                                    Mãi </span></a></li>
                        <li class="list-group-item"> <a href="index.php"><span> Đồ Uống | caffe  </span></a></li>
                        <li class="list-group-item"> <a href="index.php"><span>...............  </span></a></li>
                        <li > <img class="list-group-item" src="./Content/image/header4.gif" width="250px"  height="300" ></li>
                    </ul>
                </div>
            </aside>
            <script > 
        function Hoidap()
        {
            question = confirm ("Khi Bạn Đăng Xuất giỏ hàng =0 ,hãy đăng nhập để thanh toán giỏ hàng của mình ")
            if( question!= "0" ){
                top.location="index.php?action=dangnhap&act=dangxuat"
            }
        }
    </script>