<?php

permission_user();

require_once('admin/models/products.php');

$title = 'Total List of Products';
$productNav = 'class="active open"';

require('admin/views/product/index.php');
