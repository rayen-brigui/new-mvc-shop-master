<?php

if (!empty($_GET['code'])) {

    $selectUserOption = [
        'order_by' => 'id',
    ];
    $user_need_activate = getAll('users', $selectUserOption);
    foreach ($user_need_activate as $user) {
        if ($user['verificationCode'] == $_GET['code']) {
            $userVerifyId = $user['id'];
        }
    }
    $user_edit = [
        'id' => $userVerifyId,
        'verified' => 1,
    ];
    save('users', $user_edit);
    echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> You have successfully confirmed changing the new email for your account, you can now log in to MW Jewel's website. Go to <a href='admin.php'>Login</a></div></div>";
    require('content/views/register/result.php');
}
