<?php

permission_user();

$options = [
    'where' => 'status = 3',
    'order_by' => 'createtime DESC',
];

$orderComplete = getAll('orders', $options);

$title = 'Order has been cancelled';
$orderNav = 'class="active open"';
$status = [
  0 => 'Unprocessed',
     1 => 'Processed',
     2 => 'Processing',
     3 => 'Canceled',
];

require('admin/views/order/order-cancell.php');
