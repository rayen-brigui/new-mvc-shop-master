<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once('admin/models/users.php');
if (isset($_POST['id'])) {
    $id = intval($_POST['id']);
    $newpassword = md5($_POST['newpassword']);
    $confirmNewPassword = md5($_POST['confirmNewPassword']);

    $user = getRecord('users', $id);
    $email = $user['user_email'];
    if ($newpassword == $user['user_password']) {
        echo "<div style='padding-top: 200px' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Changing the password is problematic. The new password you just entered is your current password. <br><br>Do you remember your password yet <i class='zmdi zmdi-favorite'></i> !! <br><a href='javascript: history.go(-1)'>Back</a> or <a href='index.php'>Go to homepage</a></div></div >";
     } elseif (strlen($_POST['newpassword']) < 8) {
         echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-danger'><strong>NO!</strong> Password change failed. The password you entered must be 8 characters or more !! <br><a href='javascript: history.go(-1)'>Back</a> or <a href='index.php'>Go Home</a></div></div>";
    } elseif ($newpassword == $confirmNewPassword) {
        $options = [
            'id' => $id,
            'user_password' => $newpassword,
        ];
        save('users', $options);

        //send mail
        include 'lib/config/sendmail.php';
        $mail = new PHPMailer(true);

        try {
            //content
            $htmlStr = "";
            $htmlStr .= "Hello " . $user['user_username'] . ' (' . $email . "),<br /><br />";
             $htmlStr .= "Your password was recently changed...<br /><br />";
             $htmlStr .= "Please check and <a href='" . PATH_URL . "admin.php'>Log in</a></div> again with your new password.<br><br>";
             $htmlStr .= "Sincerely,<br />";
            //Server settings
            $mail->CharSet = "UTF-8";
            $mail->SMTPDebug = 0; // Enable verbose debug output (0 : ko hiện debug, 1 hiện)
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = SMTP_HOST;  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = SMTP_UNAME; // SMTP username
            $mail->Password = SMTP_PWORD; // SMTP password
            $mail->SMTPSecure = 'ssl'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = SMTP_PORT; // TCP port to connect to
            //Recipients
            $mail->setFrom(SMTP_UNAME, "Chị Kòi Quán");
            $mail->addAddress($email, $email);     // Add a recipient | name is option tên người nhận
            $mail->addReplyTo(SMTP_UNAME, 'Tân Hồng IT');
            //$mail->addCC('CCemail@gmail.com');
            //$mail->addBCC('BCCemail@gmail.com');
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'You have Change your Password ';
            $mail->Body = $htmlStr;
            $mail->AltBody = $htmlStr; //None HTML
            $result = $mail->send();
            if (!$result) {
                $error = "Có lỗi xảy ra trong quá trình gửi mail";
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        echo '<div style="padding-top: 200px" class="container"><div class="alert alert-success" style="text-align: center;"><strong>Good!</strong> You have successfully changed your password. And a notification message has been sent to this user s email. Go to <a href="admin.php?controller=home&action=login">Login</a> page and log in again.!!</div></div>';
    } else {
        echo "<div style='padding-top: 200px' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> Changing the password is problematic. The password validation input box does not match the new password you entered!! <br><a href='javascript: history.go(-1)'>Back</a> or <a href='index.php'>Go to home page</a></div></div>";
    }
}
require('content/views/forgot-password/result.php');
