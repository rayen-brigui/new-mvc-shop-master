<?php

permission_user();

require_once('admin/models/comments.php');

$title = 'Comments have not been approved';
$navComment = 'class="active open"';

require('admin/views/comment/pending.php');
