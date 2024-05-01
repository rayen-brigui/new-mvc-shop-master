<?php

function feedback_add()
{
    $feedback_add = [
        'id' => intval($_POST['feedback_id']),
        'name' => escape($_POST['name']),
        'createTime' => gmdate('Y-m-d H:i:s', time() + 7 * 3600),
        'email' => escape($_POST['email']),
        'phone' => escape($_POST['phone']),
        'subject' => escape($_POST['message']),
        'user_id' => intval($_POST['user_id']),
        'product_id' => intval($_POST['product_id']),
        'order_id' => 0,
        'status' => 0,
    ];
    $phone = addslashes($_POST['phone']);
    $email = addslashes($_POST['email']);
    if (!preg_match("/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i", $email)) {
        echo "<div style='padding-top: 200px' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong>This email is not valid. Please enter another email. <br><br><a href='javascript: history.go(-1)'>Return</a></div></div>";
        require('content/views/feedback/result.php');
        exit;
    } elseif (!preg_replace("[^0-9]", '', $phone)) {
        echo "<div style='padding-top: 200px' class='container'><div class='alert alert-danger' style='text-align: center;'><strong>NO!</strong> This phone number is not valid. Please re-enter another phone number. <br><br><a href='javascript: history.go(-1)'>Back</a></div></div>";
        require('content/views/feedback/result.php');
        exit;
    }
    save('feedbacks', $feedback_add);
    echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong>Your response has been sent to MW Jewel's system. Thank you for sending it back to the shop. <br><br>Go to <a href='index.php'>Home page</a></div></div>";
    require('content/views/feedback/result.php');
    exit;
}
