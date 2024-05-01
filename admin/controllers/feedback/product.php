<?php

permission_user();

require_once('admin/models/feedbacks.php');

$title = 'Customer feedback on the product';
$navFeedback = 'class="active open"';

require('admin/views/feedback/product.php');
