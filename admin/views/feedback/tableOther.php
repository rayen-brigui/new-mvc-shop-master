<?php
$options = [
    'order_by' => 'id desc',
    'where' => 'order_id=0 and product_id=0',
];
$feedbacks = getAll('feedbacks', $options);
?>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                 <h2>Data Retrieval <strong>"Unknown response"</strong> </h2>
                 <ul class="header-dropdown">
                     <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> < /a>
                         <ul class="dropdown-menu dropdown-menu-right slideUp">
                             <li><a href="admin.php?controller=feedback&action=product">Product feedback</a></li>
                             <li><a href="admin.php?controller=feedback&action=order">Order feedback</a></li>
                         </ul>
                     </li>
                     <li class="remove">
                         <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                     </li>
                 </ul>
             </div>
             <div class="body">
                 <div class="table-responsive">
                     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                         <thehead>
                             <tr>
                                 <th>Name | (User ID)</th>
                                 <th>Time</th>
                                 <th>Email</th>
                                 <th>Phone number</th>
                                 <th>Content</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tfoot>
                             <tr>
                                 <th>Name | (User ID)</th>
                                 <th>Time</th>
                                 <th>Email</th>
                                 <th>Phone number</th>
                                 <th>Content</th>
                                 <th>Action</th>
                             </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($feedbacks as $feedback) :
                                if ($feedback['status'] == 1) : ?>
                                    <tr>
                                        <td><?= $feedback['name'] ?> |<?= $feedback['user_id'] ?></td>
                                        <td><?= getTime($feedback['createTime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                        <td><?= $feedback['email'] ?></td>
                                        <td><?= $feedback['phone'] ?></td>
                                        <td><?php
                                            if (strlen($feedback['subject']) > 200) {
                                                echo substr($feedback['subject'], 0, 200) . '...';
                                            } else {
                                                echo $feedback['subject'];
                                            } ?></td>
                                        <td>
                                            <a title="UnApprove" class="btn btn-default btn-icon" href="admin.php?controller=feedback&action=unapproved&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-minus-circle"></i></a>
                                            <a onclick="return confirm('Are you sure to delete?')" title="Delete" class="btn btn-danger btn-icon" href="admin.php?controller=feedback&action=delete&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                                            <a title="Edit" class="btn btn-warning btn-icon" href="admin.php?controller=feedback&action=edit&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eyedropper"></i></a>
                                            <a title="View detail" class="btn btn-success btn-icon" href="admin.php?controller=feedback&action=view&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eye"></i></a>
                                            <a title="Reply" class="btn btn-primary btn-icon" href="admin.php?controller=feedback&action=reply&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-mail-reply"></i></a>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr style="background-color: #FFD18E;">
                                        <td><?= $feedback['name'] ?> |<?= $feedback['user_id'] ?></td>
                                        <td><?= getTime($feedback['createTime'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></td>
                                        <td><?= $feedback['email'] ?></td>
                                        <td><?= $feedback['phone'] ?></td>
                                        <td><?php
                                            if (strlen($feedback['subject']) > 200) {
                                                echo substr($feedback['subject'], 0, 200) . '...';
                                            } else {
                                                echo $feedback['subject'];
                                            } ?></td>
                                        <td>
                                            <a title="Approve" class="btn btn-info btn-icon" href="admin.php?controller=feedback&action=approved&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-check-circle"></i></a>
                                            <a onclick="return confirm('Are you sure to delete?')" title="Delete" class="btn btn-danger btn-icon" href="admin.php?controller=feedback&action=delete&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                                            <a title="Edit" class="btn btn-warning btn-icon" href="admin.php?controller=feedback&action=edit&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eyedropper"></i></a>
                                            <a title="View detail" class="btn btn-success btn-icon" href="admin.php?controller=feedback&action=view&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-eye"></i></a>
                                            <a title="Reply" class="btn btn-primary btn-icon" href="admin.php?controller=feedback&action=reply&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-mail-reply"></i></a>
                                        </td>
                                    </tr>
                            <?php endif;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
