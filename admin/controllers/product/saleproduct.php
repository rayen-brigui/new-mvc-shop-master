<?php

permission_user();
//load model
require_once('admin/models/products.php');

if (isset($_POST['product_id'])) {
    foreach ($_POST['product_id'] as $productId) {
        $productId = intval($productId);
        postDestroy($productId);
    }
}
$title = 'Promotional products';
$productNav = 'class="active open"';

require('admin/views/product/saleproduct.php');
