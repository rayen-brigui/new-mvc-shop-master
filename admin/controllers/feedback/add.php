<?php

require_once('admin/models/feedbacks.php');
require_once('admin/models/order.php');

if (!empty($_POST)) {
    addFeedbackOrder();
    echo "<div style='padding-top: 200px' class='container'><div style='text-align: center;' class='alert alert-success'><strong>Done!</strong> Your feedback has been sent to Ms. Koi restaurant's system. Thank you for your feedback about the restaurant. <br><br >Go to <a href='admin.php'>Dashboard</a></div></div>"; require('content/views/feedback/result.php');
    exit;
}

if (isset($_GET['order_id'])) {
    $orderId = intval($_GET['order_id']);
} else {
    $orderId = 0;
}

$order = getRecord('orders', $orderId);
$orderDetail = orderDetail($orderId);

if (isset($userNav)) {
    $userAction = getRecord('users', $userNav);
}

$status = [
     0 => 'Confirmed',
     1 => 'Processed',
     2 => 'Processing',
     3 => 'Canceled',
];
$title = 'Send your feedback to MW Jewels';
$navFeedback = 'class="active open"';

require('admin/views/feedback/add.php');
