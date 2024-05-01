<?php

permission_user();

require_once('admin/models/products.php');

$title = 'Total Products Just edited';
$productNav = 'class="active open"';

require('admin/views/product/update.php');
