<?php
$txttenkh=$txtusername=$txtdiachi=$txtsodt=$txtemail=$txtpass="";
$txttenkhErr=$txtusernameErr=$txtdiachiErr=$txtsodtErr=$txtemailErr=$txtpassErr="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //phaats co
    $error=array();

    if(empty($_POST['txttenkh']))
    {
      $error['txttenkh']="tên của bạn không được để trống !!";
    }else{
      $txttenkh=$_POST['txttenkh'];
      if(!preg_match('/^[a-zA-Z-]*$/',$txttenkh))
      {
         // nếu sai thì in ra 
         $error['txttenkh']="tên của bạn phải phù hợp ";
      }
    }
//////
    if(empty($_POST['txtusername']))
    {
      $error['txtusername']="tên đăng nhập không được để trống !!";
    }else{
      $txtusername=$_POST['txtusername'];
    }
    /////
    if(empty($_POST['txtdiachi']))
    {
      $error['txtdiachi']="địa chỉ không được để trống !!";
    }else{
      $txtdiachi=$_POST['txtdiachi'];
    }
    ///
    if(empty($_POST['txtsodt']))
    {
      $error['txtsodt']="số điện thoại không được bỏ trống !!";
    }else{
      $txtsodt=$_POST['txtsodt'];

      if(preg_match('/^[0]{1}[0-9][9,10]$/',$txtsodt))
      {
        $error['txtsodt']="0 ở đầu và dài 10,11 ký tự ";
      }
    }
    /////
    if(empty($_POST["txtemail"]))
    {
        $txtemailErr="email không được rỗng";
    }else{
        $txtemail=test_input($_POST["txtemail"]);
        if(!filter_var($txtemail,FILTER_VALIDATE_EMAIL))
        {
            $txtemailErr="email phải đúng định dạng";
        }
    }
    /// // pass in hoa ở đầu 
    if(empty($_POST['txtpass']))
    {
      $error['txtpass']="địa chỉ không được để trống !!";
    }else{
      $txtpass=$_POST['txtpass'];
      if(preg_match('/^[A-Z]([\w\.!@#$%^&*()]+){8}$/',$txtpass))
      {
        $error['txtpass']="pass phải in hoa ở đầu, số chuỗi ký tự đb và dài 8 ký tự  ";
      }
    }
    ///
    //keets luan 
    if(empty($error)){
      //xu lys theo tinh huong dl nhap du
    }
}
///
function test_input($data)
{
    $data=trim($data);//loại bỏ khảng trắng 
    $data=stripslashes($data);//thay csacs ký tự thành khoảng trắng 
    $data=htmlspecialchars($data);
    return $data;
}
?>
  <div class="login-box">
<form name="form1" action="index.php?action=dangky&act=dangky_action" method="post" id="Form-register"  class="login-form">
   <div class="user-box">
      <input type="text" placeholder="Họ Và Tên " id="txttenkh" name="txttenkh">
      <label  for="exampleInputName" class="text-uppercase" >Họ Và Tên </label>
      <?php
       if(isset($error['txttenkh'])){
      ?>
      <h3 style="color:red"><?php  echo $error['txttenkh']  ?></h3>
      <!-- <label  for="exampleInputName" class="text-uppercase">Username</label> -->
     <?php
       }
     ?>
    </div>
    <div class="user-box">
      <input type="name" class="form-control" placeholder="Tên Khi Đăng Nhập " id="txtusername" name="txtusername">
      <label  for="exampleInputName" class="text-uppercase" >Tên Đăng Nhập </label>
      <?php
       if(isset($error['txtusername'])){
      ?>
      <h3 style="color:red"><?php  echo $error['txtusername']  ?></h3>
      <!-- <label  for="exampleInputName" class="text-uppercase">Username</label> -->
     <?php
       }
     ?>
    </div>
    <div class="user-box">
      <input type="text" class="form-control" placeholder="Địa Chỉ Nhà Ở " id="txtdiachi" name="txtdiachi">
      <label  for="exampleInputName" class="text-uppercase" >Địa Chỉ</label>
      <?php
       if(isset($error['txtdiachi'])){
      ?>
      <h3 style="color:red"><?php  echo $error['txtdiachi']  ?></h3>
      <!-- <label  for="exampleInputName" class="text-uppercase">Username</label> -->
     <?php
       }
     ?>
    </div>
    <div class="user-box">
      <input type="number" class="form-control" placeholder="Số Điện Thoại Liên Lạc " id="txtsodt" name="txtsodt">
      <label  for="exampleInputName" class="text-uppercase" >Số Điện Thoại</label>
      <?php
       if(isset($error['txtsodt'])){
      ?>
      <h3 style="color:red"><?php  echo $error['txtsodt']  ?></h3>
      <!-- <label  for="exampleInputName" class="text-uppercase">Username</label> -->
     <?php
       }
     ?>
    </div>
    <div class="user-box">
      <input type="email" class="form-control" placeholder="email của bạn " id="txtemail" name="txtemail">
      <label  for="exampleInputName" class="text-uppercase" >Email</label>
      <?php
       if(isset($emailErr )){
      ?>
      <h3 style="color:red"><?php  echo $emailErr  ?></h3>
      <!-- <label  for="exampleInputName" class="text-uppercase">Username</label> -->
     <?php
       }
     ?>
    </div>
    <div class="user-box">
      <input type="password" class="form-control"  placeholder="Mật Khẩu Đăng Nhập " id="txtpass" name="txtpass">
      <label  for="exampleInputName" class="text-uppercase" >Mật Khẩu  </label>
      <?php
       if(isset($error['txtpass'])){
      ?>
      <h3 style="color:red"><?php  echo $error['txtpass']  ?></h3>
      <!-- <label  for="exampleInputName" class="text-uppercase">Username</label> -->
     <?php
       }
     ?>
    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button class="btn btn-primary float-right" name="submit" type="submit"> Đăng Ký</button> </a>
</form>  
</div>

<link rel="stylesheet" href="./Content/CSS/log_up.css">


