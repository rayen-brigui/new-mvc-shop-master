<?php

require_once('admin/models/purchase.php');

global $userNav;

if (!empty($userNav)) {
    $options = [
        'where' => 'status = 1 and user_id =' . $userNav,
        'order_by' => 'createtime DESC',
    ];
    $receiedOrders = getAll('orders', $options);
    $title = 'Order received';
     $yourPurchaseNav = 'class="active open"';
     $status = [
         0 => 'Order confirmed',
         2 => 'Delivery',
         1 => 'Delivered',
     ];
}

require('admin/views/purchase/receied.php');
