<?php

permission_user();
permission_moderator();
require_once('admin/models/users.php');
if (!empty($_POST)) {
    user_add();
}
if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']);
} else {
    $userId = 0;
}
$title = ($userId == 0) ? 'Add information' : 'Update account information';
$nav_user = 'class="active open"';
$user_info = getRecord('users', $userId);
require('admin/views/user/add.php');
