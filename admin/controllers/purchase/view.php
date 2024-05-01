<?php

require_once('admin/models/order.php');

if (isset($_GET['order_id'])) {
    $orderId = intval($_GET['order_id']);
} else {
    $orderId = 0;
}

$order = getRecord('orders', $orderId);

if (!$order) {
    show404NotFound();
}

$title = 'Order details';
$yourPurchaseNav = 'class="active open"';
$orderDetail = orderDetail($orderId);

$status = [
     0 => 'Order confirmed',
     2 => 'Delivery',
     1 => 'Delivered',
     3 => 'Order cancelled',
];

require('admin/views/purchase/view.php');
