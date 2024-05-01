<?php

permission_user();

require_once('admin/models/users.php');

$options = [
    'order_by' => 'id ASC',
];
$title = 'List of Admins';
$adminNav = 'class="active open"';
$list_user = getAll('users', $options);

require('admin/views/role/admin.php');
