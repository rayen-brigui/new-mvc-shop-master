<?php

permission_user();

require_once('admin/models/feedbacks.php');

$title = 'Unapproved response';
$navFeedback = 'class="active open"';

require('admin/views/feedback/pending.php');
