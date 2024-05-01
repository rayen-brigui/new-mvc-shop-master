<?php
$option = [
    'order_by' => 'id desc',
    'where' => 'status=3',
];
$comments = getAll('comments', $option);
?>
<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
              <h2>Data Retrieval <strong>"Unapproved comments"</strong> </h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="admin.php?controller=comment">All comment</a></li>
                            <li><a href="admin.php?controller=comment&action=trash">Trash</a></li>
                            <li><a href="admin.php?controller=comment&action=spam">Spam</a></li>
                            <li><a href="admin.php?controller=comment&action=pending">Pending</a></li>
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
                        <thead>
                            <tr>
                            <th>Comment</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tfoot>
                             <tr>
                                 <th>Comment</th>
                                 <th>Action</th>
                             </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($comments as $comment) :
                                if ($comment['product_id'] <> 0) {
                                    $product = getRecord('products', $comment['product_id']);
                                } elseif ($comment['post_id'] <> 0) {
                                    $post = getRecord('posts', $comment['post_id']);
                                } elseif ($comment['page_id'] <> 0) {
                                    $page = getRecord('posts', $comment['page_id']);
                                } ?>
                                <tr>
                                    <td>
                                        <?= '<image src="public/upload/images/' . $comment['link_image'] . '?time=' . time() . '" style="max-width:20px;" />'; ?>
                                        <strong><?= $comment['author'] ?></strong> | <strong><?= getTime($comment['createDate'], gmdate('Y:m:d H:i:s', time() + 7 * 3600)) ?></strong>
                                        <br><?php if ($comment['product_id'] <> 0) { ?>
                                            <a target="_blank" href="<?= PATH_URL . 'product/' . $product['id'] . '-' . $product['slug'] ?>"><?= PATH_URL . 'product/' . $product['id'] . '-' . $product['slug'] ?></a>
                                        <?php } elseif ($comment['post_id'] <> 0) { ?>
                                            <a target="_blank" href="<?= PATH_URL . 'post/' . $post['id'] . '-' . $post['post_slug'] ?>"><?= PATH_URL . 'post/' . $post['id'] . '-' . $post['post_slug'] ?></a>
                                        <?php } elseif ($comment['page_id'] <> 0) { ?>
                                            <a target="_blank" href="<?= PATH_URL . 'page/' . $page['id'] . '-' . $page['post_slug'] ?>"><?= PATH_URL . 'page/' . $page['id'] . '-' . $page['post_slug'] ?></a>
                                        <?php } ?>
                                        <br>( <?= $comment['email'] ?> )<br><br>
                                        <?= $comment['content'] ?>
                                    </td>
                                    <td>
                                        <a title="Not spam" class="btn btn-info btn-icon" href="admin.php?controller=comment&action=unapproved&comment_id=<?= $comment['id'] ?>"> <i class="zmdi zmdi-minus-circle"></i></a>
                                        <a onclick="return confirm('Are you sure to delete?')" title="Delete Permanently" class="btn btn-danger btn-icon" href="admin.php?controller=comment&action=delete&comment_id=<?= $comment['id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
