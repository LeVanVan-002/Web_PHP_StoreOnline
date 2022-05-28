<?php
$action="fogetpassword";
if(isset($_GET['act']))
{
    $action=$_GET['act'];
}
switch ($action) {
    case "fogetpassword":
        include "View/forgetpassword.php";
        break;
        case "forgetps_action":
            //lúc này 
            if(isset($_POST['submit_email'])&& $_POST['email'])
            {
                $getemail=$_POST['email'];
                $ur=new User();
                $result=$ur->getEmail($getemail);
                // laays về em ail và mk trả về từ db 
                $email=md5($result['email']);
                $pass=md5($result['matkhau']);
                //tạo đường link ddeeer gửi qua email 
                $link="<a href='http://localhost/index.php?action=forgetps&act=resetps&key=".$email."&reset=".$pass."'>Click To Reset password</a>";
                $mail= new PHPMailer();
                $mail->CharSet="utf-8";
                $mail->IsSMTP();  
                // enable SMTP authentication
                $mail->SMTPAuth=true;                  
                // GMAIL username
                $mail->Username="levanvan009@gmail.com";//địa chỉ mail của em của công ty từ 
                // GMAIL password
                $mail->Password="levanvan200920020ok";//mk mail trang web bán giày 
                $mail->SMTPSecure="tls";  
                // sets GMAIL as the SMTP server
                $mail->Host="smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port="587";
                $mail->From='levanvan009@gmail.com';//từ 
                $mail->FromName='văn văn';
                $mail->AddAddress($getemail,'reciever_name');
                $mail->Subject='thay đổi mật khẩu';
                $mail->IsHTML(true);
                $mail->Body='nhấn vào để thay đổi mật khẩu của bạn '.$link.'';
                if($mail->Send())
                {
                echo "xem lại email của bạn ";
                }
                else
                {
                echo "Lỗi email - >".$mail->ErrorInfo;
                }
            }
            break;
            case "resetps":
                include "View/resetpw.php";
                break;
            case "submit_new":
                if(isset($_POST['submit_password']))
                {
                $passnew=md5($_POST['password']);
                $emailold=$_POST['email'];
                $ur=new User();
                $ur->updateEmail($emailold,$passnew);
                echo '<script> alert ("thay đổi thành công ");</script>'
                }
                include "View/login.php";
                break;
}
?>