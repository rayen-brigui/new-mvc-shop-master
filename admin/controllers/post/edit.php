<?php

permission_user();

//load model
require_once('admin/models/posts.php');

if (!empty($_POST)) {
    post_update();
}

if (isset($_GET['post_id'])) {
    $postId = intval($_GET['post_id']);
} else {
    $postId = 0;
}

$title = 'Edit article';
$postNav = 'class="active open"';
$post = getRecord('posts', $postId);
global $userNav;
$loginUser = getRecord('users', $userNav);

if ($loginUser['role_id'] == 2) {
    if ($post['post_author'] == $userNav) {
        require('admin/views/post/edit.php');
    } else {
        header('location:admin.php?controller=post');
    }
} else {
    require('admin/views/post/edit.php');
}
