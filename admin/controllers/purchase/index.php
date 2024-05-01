<?php

require_once('admin/models/purchase.php');

global $userNav;

if (!empty($userNav)) {
    $options = [
        'where' => 'user_id =' . $userNav,
        'order_by' => 'createtime DESC',
    ];
    $orders = getAll('orders', $options);
   $title = 'All your orders';
     $yourPurchaseNav = 'class="active open"';
     $status = [
         0 => 'Order confirmed',
         2 => 'Delivery',
         1 => 'Delivered',
         3 => 'Order cancelled',
    ];
}

require('admin/views/purchase/index.php');
