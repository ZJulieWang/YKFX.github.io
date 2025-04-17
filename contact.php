<?php
if (isset($_POST['submit'])) { 
    // 清理并获取输入
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // 检查邮箱格式是否合法
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Invalid Email Address');</script>";
        exit;
    }

    // 设置接收邮箱地址（请替换成你自己的）
    $toEmail = 'wangyi9003@gmail.com';

    // 邮件头部设置
    $headers  = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    // 邮件正文
    $body  = "Name: $name<br>";
    $body .= "Email: $email<br>";
    $body .= "Subject: $subject<br>";
    $body .= "Message:<br>" . nl2br($message);

    // 尝试发送邮件
    if (mail($toEmail, $subject, $body, $headers)) {
        echo "<script>alert('Email Sent!');</script>";
        echo "<script>window.location.href='index.html';</script>";
    } else {
        echo "<script>alert('Unsuccessful! Please Try Again.');</script>";
    }
}
?>
