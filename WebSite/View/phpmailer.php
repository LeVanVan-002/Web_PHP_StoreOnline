<!DOCTYPE html>
<html>
	<head>
		<title>Hãy Đánh Giá Chúng Tôi Phát Triển Hơn</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</head>
	<body>
<?php

$error = '';
$name = '';
$email = '';
$subject = '';
$message = '';

function clean_text($string)
{
	$string = trim($string);
	$string = stripslashes($string);
	$string = htmlspecialchars($string);
	return $string;
}

if(isset($_POST["submit"]))
{
	if(empty($_POST["name"]))
	{
		$error .= '<p><label class="text-danger">Xin hãy nhập tên của bạn</label></p>';
	}
	else
	{
		$name = clean_text($_POST["name"]);
		if(!preg_match("/^[a-zA-Z ]*$/",$name))
		{
			$error .= '<p><label class="text-danger">Chỉ cho phép các chữ cái và khoảng trắng</label></p>';
		}
	}
	if(empty($_POST["email"]))
	{
		$error .= '<p><label class="text-danger">Vui lòng nhập email của bạn</label></p>';
	}
	else
	{
		$email = clean_text($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			$error .= '<p><label class="text-danger">Định dạng email không hợp lệ</label></p>';
		}
	}
	if(empty($_POST["subject"]))
	{
		$error .= '<p><label class="text-danger">Chủ đề là bắt buộc</label></p>';
	}
	else
	{
		$subject = clean_text($_POST["subject"]);
	}
	if(empty($_POST["message"]))
	{
		$error .= '<p><label class="text-danger">Tin nhắn là bắt buộc</label></p>';
	}
	else
	{
		$message = clean_text($_POST["message"]);
	}
	if($error == '')
	{
		// De send duoc email thì phải chỉnh Cho Phép Ứng Dụng Kém An Toàn
		// nếu không email sẽ chặn việc send mail đi

		// Một số ứng dụng và thiết bị sử dụng công nghệ đăng nhập kém an toàn, khiến tài khoản của bạn dễ bị tấn công.
		// Chúng tôi khuyên bạn tắt quyền truy cập của các ứng dụng đó.
		// Bạn vẫn có thể cấp quyền truy cập để dùng các ứng dụng đó, nhưng rủi ro có thể xảy ra.
		// Google sẽ tự động TẮT tùy chọn cài đặt này nếu bạn không sử dụng.
		// https://support.google.com/accounts?p=less-secure-apps&hl=vi
		//
		require 'class/class.phpmailer.php';
		$mail = new PHPMailer;
		$mail->IsSMTP();								//Sets Mailer to send message using SMTP
		$mail->Host = 'smtp.gmail.com';		//Sets the SMTP hosts of your Email hosting, this for Godaddy
		$mail->Port = 587;								//Sets the default SMTP server port 587, 465
		$mail->SMTPAuth = true;							//Sets SMTP authentication. Utilizes the Username and Password variables
		$mail->Username = 'levanvan009@gmail.com';					//Sets SMTP username
		$mail->Password = 'levanvan200920020ok';					//Sets SMTP password
		$mail->SMTPSecure = 'tls';							//Sets connection prefix. Options are "", "ssl" or "tls"
		$mail->From = 'levanvan009@gmail.com';					//Sets the From email address for the message
		$mail->FromName = 'Văn Văn';				//Sets the From name of the message
		$mail->AddAddress($_POST["email"], $_POST["name"]);		//Adds a "To" address
		//$mail->AddCC($_POST["email"], $_POST["name"]);	//Adds a "Cc" address
		$mail->WordWrap = 50;							//Sets word wrapping on the body of the message to a given number of characters
		$mail->IsHTML(true);							//Sets message type to HTML	// khai báo nội dung email hiển thị định dạng HTML			
		$mail->Subject = $_POST["subject"];				//Sets the Subject of the message
		$mail->Body = $_POST["message"];				//An HTML or plain text message body
		if($mail->Send())								//Send an Email. Return true on success or false on error
		{
			$error = '<label class="text-success">Cám ơn bạn đã liên lạc với chúng tôi</label>';
		}
		else
		{
			$error = '<label class="text-danger">Có một lỗi</label>';
		}
		$name = '';
		$email = '';
		$subject = '';
		$message = '';
	}
}
?>
		<br />
		<div class="container">
			<div class="row">
				<div class="col-md-8" style="margin:0 auto; float:none;">
					<br />
					<?php echo $error; ?>
					<form method="post">
						<div class="form-group">
							<label>nhập tên của bạn</label>
							<input type="text" name="name" placeholder="nhập tên của bạn" class="form-control" value="<?php echo $name; ?>" />
						</div>
						<div class="form-group">
							<label>nhập email của bạn</label>
							<input type="text" name="email" class="form-control" placeholder="nhập email của bạn" value="<?php echo $email; ?>" />
						</div>
						<div class="form-group">
							<label>nhập chủ đề góp ý</label>
							<input type="text" name="subject" class="form-control" placeholder="nhập chủ đề góp ý" value="<?php echo $subject; ?>" />
						</div>
						<div class="form-group">
							<label>nội dung góp ý của bạn</label>
							<textarea name="message" class="form-control" placeholder="nội dung góp ý của bạn"><?php echo $message; ?></textarea>
						</div>
						<div class="form-group" align="center">
							<input type="submit" name="submit" value="gửi đi" class="btn btn-info" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>





