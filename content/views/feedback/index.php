<?php

/**
 * @var array $userLogin
 * @var array $userAction
 */
require('content/views/shared/header.php'); ?>
<div role="main" class="main shop">
    <div class="container">
        <hr class="tall">
        <div class="row">
            <div class="col-md-12">
                <h2 class="shorter"><strong>Send your feedback to JW Jewels</strong></h2>
                 <?php if (isset($userNav)) {
                     echo '<p>You are logged in as user: <a href="admin.php?controller=user&action=info&user_id=' . $userNav . '"><b>' . $userAction['user_name'] . '</b></a></p>';
                 } else {
                     echo '<p>Do you already have a user account? <a href="admin.php">Click here to log in.</a></p>';
                } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                   <strong>Feedback</strong>
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="accordion-body collapse in">
                            <div class="panel-body">
                                <form action="index.php?controller=feedback" role="form" id="" method="post">
                                    <input type="hidden" name="feedback_id" value="0">
                                    <?php if ($product <> 0) { ?>
                                        <input type="hidden" class="form-control" name="product_id" value="<?= $product['id'] ?>">
                                    <?php } else {
                                        echo '<input type="hidden" class="form-control" name="product_id" value="0">';
                                    } ?>
                                    <?php if (!isset($userNav)) : ?>
                                        <input type="hidden" class="form-control" name="user_id" value="0">
                                        <div class="row">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                   <label><strong>Full Name</strong></label>
                                                     <input type="text" name="name" class="form-control" required="required" placeholder="Enter real name and surname...">
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="row">
                                             <div class="form-group">
                                                 <div class="col-md-6">
                                                     <label><strong>Email</strong></label>
                                                     <input type="text" name="email" required="required" class="form-control" placeholder="Enter your email..">
                                                 </div>
                                                 <div class="col-md-6">
                                                     <label><strong>Contact phone number</strong></label>
                                                     <input type="text" name="phone" class="form-control" placeholder="enter your phone number..">
                                                 </div>
                                             </div>
                                         </div>
                                     <?php else : ?>
                                         <h3>You will send feedback as the user: <a href="admin.php?controller=user&action=info&user_id=<?= $userNav ?>"><b><?= $userAction['user_name '] ?></b></a></h3>
                                         <input type="hidden" class="form-control" name="user_id" value="<?= $userNav ?>">
                                         <input type="hidden" name="name" value="<?= $userLogin['user_name'] ?>" class="form-control">
                                         <input type="hidden" name="email" value="<?= $userLogin['user_email'] ?>" class="form-control">
                                         <input type="hidden" value="<?= $userLogin['user_phone'] ?>" name="phone" class="form-control">
                                     <?php endif; ?>
                                     <div class="row">
                                         <div class="form-group">
                                             <div class="col-md-12">
                                                 <label><strong>Message - response details: </strong></label>
                                                 <textarea name="message" id="message" class="form-control" cols="30" rows="10" placeholder="Please enter information about your response in this box..."> </textarea>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="form-group" style="text-align: center">
                                         <button type="submit" class="btn btn-primary"><i class="fa fa-check-square-o"></i> Confirm sending feedback</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <?php if ($product <> 0) : ?>
                   <h3>The product you selected for feedback</h3>
                     <div class="row">
                         <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
                             <li class="product">
                                 <?php if ($product['saleoff'] != 0) : ?>
                                     <a href="type/3-san-pham-dang-giam">
                                         <span class="onsale">-<?= $product['percentoff']; ?>%</span>
                                     </a>
                                 <?php endif; ?>
                                 <span class="product-thumb-info">
                                     <form action="cart/add/<?= $product['id']; ?>" method="post">
                                         <input type="hidden" name="number_cart" value="1">
                                         <a class="add-to-cart-product"><button type="submit" href="cart/add/<?= $product['id']; ?>"><i class="fa fa -shopping-cart"></i> Add to cart</button></a>
                                     </form>
                                     <a href="product/<?= $product['id']; ?>-<?= $product['slug']; ?>">
                                         <span class="product-thumb-info-image">
                                             <span class="product-thumb-info-act">
                                                 <span class="product-thumb-info-act-left"><em>Views</em></span>
                                                 <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                            </span>
                                            <img alt="" class="img-responsive" src="public/upload/products/<?= $product['img1']; ?>">
                                        </span>
                                    </a>
                                    <span class="product-thumb-info-content">
                                        <a href="product/<?= $product['id']; ?>-<?= $product['slug']; ?>">
                                            <h4 title="<?= $product['product_name']; ?>"><?php if (strlen($product['product_name']) > 50) {
                                                echo substr($product['product_name'], 0, 57) . '...';
                                            } else {
                                                echo $product['product_name'];
                                            }  ?></h4>
                                            <span class="price">
                                                <?php if ($product['saleoff'] != 0) { ?>
                                                    <del><span class="amount"><?= number_format($product['product_price'], 0, ',', '.');  ?></span></del>
                                                    <ins><span class="amount"><?= number_format(($product['product_price']) - (($product['product_price'] * $product['percentoff']) / 100), 0, ',', '.'); ?> TND</span></ins>
                                                <?php } else { ?>
                                                    <ins><span class="amount"><?= number_format($product['product_price'], 0, ',', '.');  ?> TND</span></ins>
                                                <?php } ?>
                                            </span>
                                        </a>
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php
require('content/views/shared/footer.php');
