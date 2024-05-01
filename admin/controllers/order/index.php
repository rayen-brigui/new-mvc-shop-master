<?php

permission_user();

if (isset($_POST['order_id'])) {
    foreach ($_POST['order_id'] as $orderId) {
        $orderId = intval($orderId);
    }
}

$options = [
    'order_by' => 'status ASC, id DESC',
];

$url = 'admin.php?controller=order';
$totalRows = getTotal('orders', $options);
$title = 'Orders';
$orderNav = 'class="active open"';
$orders = getAll('orders', $options);

$status = [
    0 => 'Unprocessed',
     1 => 'Processed',
     2 => 'Processing',
     3 => 'Canceled',
];
require('admin/views/order/index.php');
