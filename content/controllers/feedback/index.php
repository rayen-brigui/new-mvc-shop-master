<?php

require_once('content/models/feedbacks.php');
if (!empty($_POST)) {
    feedback_add();
}

if (isset($_GET['product_id'])) {
    $productId = intval($_GET['product_id']);
} else {
    $productId = 0;
}

$product = getRecord('products', $productId);
if (isset($userNav)) {
    $userAction = getRecord('users', $userNav);
}
$title = 'Send your feedback to MW Jewels';
require('content/views/feedback/index.php');
