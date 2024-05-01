<?php

permission_user();
permission_moderator();

require_once('admin/models/roles.php');

if (isset($_POST['role_id'])) {
    foreach ($_POST['role_id'] as $roleId) {
        $roleId = intval($roleId);
        roleDestroy($roleId);
    }
}

$url = 'admin.php?controller=role';
$options = [
    'order_by' => 'id ASC',
];
$title = 'List of website access rights';
$adminNav = 'class="active open"';
$roles = getAll('roles', $options);

require('admin/views/role/index.php');
