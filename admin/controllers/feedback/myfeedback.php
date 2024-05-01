<?php

$title = 'All your feedback';
$navFeedback = $yourFeedback = 'class="active open"';
global $userNav;

$option = [
    'order_by' => 'id desc',
    'where' => 'user_id=' . $userNav,
];
$feedbacks = getAll('feedbacks', $option);

require('admin/views/feedback/myfeedback.php');
