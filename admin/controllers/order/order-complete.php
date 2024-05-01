<?php

permission_user();

$options = [
    'where' => 'status = 1',
    'order_by' => 'createtime DESC',
];
$orderComplete = getAll('orders', $options);

$title = 'Order processed';
$orderNav = 'class="active open"';
$status = [
     0 => 'Unprocessed',
     1 => 'Processed',
     2 => 'Processing',
];
require('admin/views/order/order-complete.php');
