<?php

permission_user();

require_once('admin/models/feedbacks.php');

$title = 'Customer feedback on orders';
$navFeedback = 'class="active open"';

require('admin/views/feedback/order.php');
