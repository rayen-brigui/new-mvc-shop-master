<?php

//form submit
if (!empty($_POST)) {
    foreach ($_POST['number'] as $productId => $number) {
        cart_update($productId, $number);
        global $userNav;
        if (isset($userNav)) {
            mergeCartSessionWithDB();
        }
    }
    header('location:index.php?controller=cart');
}
$title = 'Shopping Cart - MW Jewels';
$cart = cart_list();
//load vieư
require('content/views/cart/index.php');
