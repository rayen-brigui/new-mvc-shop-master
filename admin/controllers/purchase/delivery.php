<?php

require_once('admin/models/purchase.php');

global $userNav;

if (!empty($userNav)) {
    $options = [
        'where' => 'status = 2 and user_id =' . $userNav,
        'order_by' => 'createtime DESC',
    ];
    $deliveryOrders = getAll('orders', $options);
    $title = 'Order is shipping';
     $yourPurchaseNav = 'class="active open"';
     $status = [
         0 => 'Order confirmed',
         2 => 'Delivery',
         1 => 'Delivered',
     ];
}

require('admin/views/purchase/delivery.php');
