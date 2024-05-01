<?php

permission_user();
permission_moderator();

$title = 'List of Database Backup files';
$backupDbClass = 'class="active open"';

require('admin/views/backupdb/list.php');
