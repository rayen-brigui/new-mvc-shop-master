<?php

$title = 'ORDER - MW Jewels';
$cart = cart_list();
if (empty($cart)) {
    header('location:.');
}
global $userNav;
if (isset($userNav)) {
    $userLogin = getRecord('users', $userNav);
}
//load view
require('content/views/cart/order.php');
