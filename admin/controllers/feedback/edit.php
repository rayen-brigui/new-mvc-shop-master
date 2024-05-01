<?php

permission_user();
permission_moderator();

require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');

if (!empty($_POST)) {
    updateFeedback();
}

if (isset($_GET['feedback_id'])) {
    $feedbackId = intval($_GET['feedback_id']);
} else {
    $feedbackId = 0;
}

$title = $feedbackId === 0 ? '' : 'Edit customer feedback';
$navFeedback = 'class="active open"';
$feedback = getRecord('feedbacks', $feedbackId);

if ($feedback['order_id'] <> 0) {
     $orderDetail = orderDetail($feedback['order_id']);
     $order = getRecord('orders', $feedback['order_id']);
}
if ($feedback['product_id'] <> 0) {
     $product = getRecord('products', $feedback['product_id']);
}

$status = [
     0 => 'Confirmed',
     1 => 'Processed - Done',
     2 => 'Processing - shipping',
     3 => 'Canceled',
];
require('admin/views/feedback/edit.php');
