<?php
/**
 * Created by PhpStorm.
 * User: love
 * Date: 2018/8/29
 * Time: 下午3:14
 */

require "/Users/love/yzhGit/TestProjects/vendor/phpmailer/phpmailer/src/PHPMailer.php";
require "/Users/love/yzhGit/TestProjects/vendor/phpmailer/phpmailer/src/SMTP.php";
require "/Users/love/yzhGit/TestProjects/vendor/phpmailer/phpmailer/src/Exception.php";

// php 发送邮件
$mail = new \PHPMailer\PHPMailer\PHPMailer();
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.qq.com";
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet = 'UTF-8';
$mail->FromName = "Rain";
$mail->Username = "1228153231@qq.com";
$mail->Password = "wjlfsdkyrhbkbaci";
$mail->From = "1228153231@qq.com";
$mail->isHTML(true);
$mail->addAddress("1228153231@qq.com");
$mail->Subject = "来自未来的邮件!";
$mail->Body = "<span>my name is yzh</span>";
$mail->addAttachment("/Users/love/Pictures/1.jpeg");
$status = $mail->send();
echo "mail send status :" . $status;



