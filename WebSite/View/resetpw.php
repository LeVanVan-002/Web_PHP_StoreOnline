<section class="login-block">
  <div class="container">
    <div class="row">
      <div class="col-md-4 login-sec">
        <!-- <h3 class="text-center"><b>Login Now</b></h3> -->
        <?php
         if(isset($_GET['key']) && isset($_GET['reset']))
         {
             $email=$_GET['key'];// phplytest20@gmail.com đã đc mã hóa ra
             $pass=$_GET['reset'];// 123456 đã đc mã hóa
             $ur=new User();
             $result=$ur->getPassEmail($email,$pass);
             if($result!=false)
             {
                $emailold=$result['email']; //phplytest20@gmail.com

        ?>
      
        <form  action="index.php?action=forgetps&act=submit_new" class="login-form" method="post">
        
            <input type="hidden" name="email" value="<?php echo $emailold;?>">
            <p>Enter New password</p>
            <input type="password" name='password'>
            <input type="submit" name="submit_password">

        </form>
       <?php
             }
            }
       ?>
      </div>
    </div>
    </div>
</section>