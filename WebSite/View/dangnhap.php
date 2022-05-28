<?php
$txtusername=$txtpassword="";
$txtusernameErr=$txtpasswordErr="";
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    //phaats co
    $error=array();
    if(empty($_POST['txtusername']))
    {
      $error['txtusername']="tên tài khoản không được để trống !!";
    }else{
      $txtusername=$_POST['txtusername'];
    }
    if(empty($_POST['txtpassword']))
    {
      $error['txtpassword']="mật khẩu không được để trống !!";
    }else{
      $txtpassword=$_POST['txtpassword'];
    }
    //keets luan 
    if(empty($error)){
      //xu lys theo tinh huong dl nhap du
      
    }
}
///
// function test_input($data)
// {
//     $data=trim($data);//loại bỏ khảng trắng 
//     $data=stripslashes($data);//thay csacs ký tự thành khoảng trắng 
//     $data=htmlspecialchars($data);
//     return $data;
// }
?>
<div class="login-box">
  <h2>Điền Thông Tin Đăng Nhập </h2>
  <form action="index.php?action=dangnhap&act=dangnhap_action" class="login-form" method="post" >
    <div class="user-box">
      <h3>tên đăng nhập </h3>
      <input type="text"  id="txtusername" name="txtusername"  placeholder="nhập tên đăng nhập ">
      <?php
       if(isset($error['txtusername'])){
      ?>
      <span style="color:red"><?php  echo $error['txtusername']  ?></span>
      <!-- <label  for="exampleInputName" class="text-uppercase">Username</label> -->
     <?php
       }
     ?>
    </div>
    <div class="user-box">
      <h3>Mật Khẩu</h3>
      <input type="password" class="form-control" id="txtpassword" name="txtpassword"  placeholder="nhập mật khẩu đăng nhập ">
      <?php
       if(isset($error['txtpassword'])){
      ?>
      <span style="color:red"><?php  echo $error['txtpassword'] ?></span>
      <?php
       }
     ?>
    </div>
    <a href="#">
      <span></span>
      <span></span>
      <span></span>
      <span></span>
      <button class="btn btn-primary float-right" name="submit_login" type="submit"> Đăng Nhập Ngay</button> </a>
  </form>
  <a href="index.php?action=forgetps">Quên Mật Khẩu</a>
</div>
<link rel="stylesheet" href="./Content/CSS/login.css">