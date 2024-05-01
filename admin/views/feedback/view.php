<?php require('admin/views/shared/header.php'); ?>
<?php require('admin/views/shared/loader.php'); ?>
<!-- Overlay For Sidebars -->
<div class="overlay"></div>
<?php require('admin/views/shared/formsearch.php'); ?>
<?php require('admin/views/shared/rightnavbar.php'); ?>
<?php require('admin/views/shared/leftnavbar.php'); ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
              <div class="col-lg-7 col-md-6 col-sm-12">
                     <h2>Information about feedback form</h2>
                     <ul class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></ li>
                         <li class="breadcrumb-item"><a href="admin.php?controller=feedback">Feedback</a></li>
                         <li class="breadcrumb-item active">Feedback Detail</li>
                     </ul>
                     <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                 </div>
                 <div class="col-lg-5 col-md-6 col-sm-12">
                     <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                 </div>
             </div>
         </div>
         <div class="container-fluid">
             <!-- Basic Examples -->
             <div class="row clearfix">
                 <div class="col-lg-12">
                     <?php if ($feedback['order_id'] <> 0) : ?>
                         <div class="card">
                             <div class="header">
                                 <h2><strong>Data Retrieval</strong> "All products in the order" </h2>
                                 <ul class="header-dropdown">
                                     <li class="dropdown"> <a href="javascript:vorder_id(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> < /a>
                                         <ul class="dropdown-menu dropdown-menu-right slideUp">
                                             <li><a href="javascript:vorder_id(0);">Action</a></li>
                                             <li><a href="javascript:vorder_id(0);">Another action</a></li>
                                             <li><a href="javascript:vorder_id(0);">Something else</a></li>
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
                                                 <th>STT</th>
                                                 <th>Product name</th>
                                                 <th>Representative image</th>
                                                 <th>Original price</th>
                                                 <th>Promotional price</th>
                                                 <th>Quantity</th>
                                                 <th>Total Price</th>
                                             </tr>
                                         </thead>
                                         <tfoot>
                                             <tr>
                                                 <th>STT</th>
                                                 <th>Product name</th>
                                                 <th>Representative image</th>
                                                 <th>Original price</th>
                                                 <th>Promotional price</th>
                                                 <th>Quantity</th>
                                                 <th>Total Price</th>
                                             </tr>
                                         </tfoot>
                                         <tbody>
                                             <?php
                                             $stt = 0;
                        $order_total = 0;
                        foreach ($orderDetail as $product) :
                            $stt++;
                            if ($product["product_typeid"] == 3) {
                                $order_total += ($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)) * $product['quantity'];
                            } else {
                                $order_total += $product['product_price'] * $product['quantity'];
                            }
                            ?>
                                                <tr>
                                                    <td><?= $stt; ?></td>
                                                    <td><a href="product/<?= $product['id']; ?>-<?= $product['slug'] ?>"><?= $product['product_name']; ?></a></td>
                                                    <td><?php if (is_file("public/upload/products/" . $product['img1'])) {
                                                        echo '<image src="public/upload/products/' . $product['img1'] . '?time=' . time() . '" style="max-width:50px;" />';
                                                    } ?></td>
                                                    <td><?= number_format($product['product_price'], 0, ',', '.') ?></td>
                                                    <td><?php if ($product['saleoff'] == 1) {
                                                        echo($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100));
                                                    } ?></td>
                                                    <td><?= $product['quantity'] ?></td>
                                                    <td><?php if ($product["product_typeid"] == 3) {
                                                        echo number_format((($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)) * $product['quantity']), 0, ',', '.');
                                                    } else {
                                                        echo number_format($product['product_price'] * $product['quantity'], 0, ',', '.');
                                                    } ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                  <h3 style="font-weight: bold;text-align: center;">Total amount : <?= number_format($order_total, 0, ',', '.'); ?> TND</h3>
                                     <h3 style="font-weight: bold; color: red; text-align: center;"><b> <?= $status[$order['status']] ?></b></h3>
                                 </div>
                             </div>
                         </div>
                     <?php elseif ($feedback['product_id'] <> 0) : ?>
                         <div class="card">
                             <div class="header">
                                 <h2><strong>Product has been selected for review</strong></h2>
                                 <ul class="header-dropdown">
                                     <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> < /a>
                                         <ul class="dropdown-menu dropdown-menu-right">
                                             <li><a href="javascript:void(0);">Q/comment</a></li>
                                             <li><a href="javascript:void(0);">Q/response</a></li>
                                             <li><a href="admin.php?controller=order">Order inquiries</a></li>
                                         </ul>
                                     </li>
                                     <li class="remove">
                                         <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                                     </li>
                                 </ul>
                             </div>
                             <div class="body">
                                 <div class="table-responsive">
                                     <table class="table table-bordered">
                                         <thehead>
                                             <tr>
                                                 <th>ID</th>
                                                 <th>Product Name</th>
                                                 <th>Price</th>
                                                 <th>Promotional price</th>
                                                 <th>Creation date</th>
                                                 <th>Photo</th>
                                                 <th>Views</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                <td><?= $product['id'] ?></td>
                                                <td><a href="admin.php?controller=product&amp;action=edit&amp;product_id=<?= $product['id']; ?>"><?= $product['product_name']; ?></a></td>
                                                <td><?= $product ? number_format($product['product_price'], 0, ',', '.') : 0; ?></td>
                                                <td><?php if ($product["saleoff"] == 1) {
                                                    echo number_format(($product['product_price'] - (($product['product_price']) * ($product['percentoff']) / 100)), 0, ',', '.');
                                                } ?></td>
                                                <td><?= $product['createDate'] ?></td>
                                                <td><?= '<image src="public/upload/products/' . $product['img1'] . '?time=' . time() . '" style="max-width:50px;" />'; ?></td>
                                                <td><?= $product['totalView'] ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <hr>
                <h2 style="font-weight: bold;">Phần thông tin phản hồi</h2>
                <div class="col-lg-12">
                    <h4 class="card-inside-title" style="font-weight:bold;">Họ và tên:</h4>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="name" disabled type="text" value="<?= $feedback ? $feedback['name'] : ''; ?>" class="form-control" id="name" placeholder="họ và tên thật..." required="" />
                            </div>
                        </div>
                    </div>
                    <h4 class="card-inside-title" style="font-weight:bold;">Email:</h4>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="email" disabled type="text" value="<?= $feedback ? $feedback['email'] : ''; ?>" class="form-control" id="color" placeholder="Nhập email của bạn..." required="" />
                            </div>
                        </div>
                    </div>
                    <h4 class="card-inside-title" style="font-weight:bold;">Số điện thoại:</h4>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input name="phone" disabled type="text" value="<?= $feedback ? $feedback['phone'] : ''; ?>" class="form-control" id="totalview" required placeholder="0123456789..." />
                            </div>
                        </div>
                    </div>
                    <h4 class="card-inside-title" style="font-weight:bold;">Nội dung:</h4>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea name="subject" disabled type="text" class="form-control" id="totalview" required placeholder="Nội dung phản hồi..."><?= $feedback ? $feedback['subject'] : ''; ?></textarea>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="form-group" style="text-align: center;">
                        <?php if ($feedback['status'] == 1) : ?>
                            <a title="UnApprove" class="btn btn-default btn-icon" href="admin.php?controller=feedback&action=unapproved&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-minus-circle"></i></a>
                        <?php else : ?>
                            <a title="Approve" class="btn btn-info btn-icon" href="admin.php?controller=feedback&action=approved&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-check-circle"></i></a>
                        <?php endif; ?>
                        <a onclick="return confirm('Are you sure to delete?')" title="Delete" class="btn btn-danger btn-icon" href="admin.php?controller=feedback&action=delete&feedback_id=<?= $feedback['id'] ?>"> <i class="zmdi zmdi-delete"></i></a>
                        <a class="btn btn-primary waves-effect" href="admin.php?controller=feedback&action=edit&feedback_id=<?= $feedback['id'] ?>">Chỉnh sửa lại thông tin phản hồi</a>
                        <a class="btn btn-warning waves-effect" href="admin.php?controller=feedback">Trở về</a>
                        <a class="btn btn-success waves-effect" href="admin.php?controller=feedback&action=reply&feedback_id=<?= $feedback['id'] ?>">Trả lời phản hồi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>
