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
                  <h2>Order information</h2>
                     <ul class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></ li>
                         <li class="breadcrumb-item"><a href="admin.php?controller=order">Orders</a></li>
                         <li class="breadcrumb-item active">Order details</li>
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
                                             <th>Representative photo</th>
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
                                             <th>Representative photo</th>
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
                                                <td><a href="product/<?= $product['id']; ?>-<?= $product['slug'] ?>"><?= number_format($product['product_price'], 0, ',', '.') ?>D</a></td>
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
                                <h3 style="font-weight: bold;text-align: center;">Total amount: <?= number_format($order_total, 0, ',', '.'); ?> TND</h3>
                                <h3 style="font-weight: bold; color: red; text-align: center;"><b> <?= $status[$order['status']] ?></b></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                      <h3>Shipping information</h3>
                         <table id="info" class="table">
                             <tr>
                                 <td><strong>Full name</strong></td>
                                 <td><?= $order['customer']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Province/ City</strong> </td>
                                 <td><?= $order['province']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Address</strong> </td>
                                 <td><?= $order['address']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Mobile</strong> </td>
                                 <td><?= $order['phone']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Time</strong> </td>
                                 <td><?= $order['createtime']; ?></td>
                             </tr>
                             <tr>
                                 <td><strong>Message from customer</strong> </td>
                                 <td><?= $order['message']; ?></td>
                             </tr>
                         </table>
                         <div style="text-align: center;" class=""><a class="btn btn-warning waves-effect" href="javascript: history.go(-1)">Back</a></div>
                     </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>
