<?php

permission_user();

require_once('admin/models/comments.php');

$title = 'Comment Spam';
$navComment = 'class="active open"';

require('admin/views/comment/spam.php');
