<?php

require_once('admin/models/purchase.php');

global $userNav;

if (!empty($userNav)) {
    $options = [
        'where' => 'status = 3 and user_id =' . $userNav,
        'order_by' => 'createtime DESC',
    ];
    $cancelledOrders = getAll('orders', $options);
   $title = 'Order canceled';
     $yourPurchaseNav = 'class="active open"';
     $status = [
         0 => 'Order confirmed',
         2 => 'Delivery',
         1 => 'Delivered',
         3 => 'Order cancelled',
    ];
}

require('admin/views/purchase/cancelled.php');
