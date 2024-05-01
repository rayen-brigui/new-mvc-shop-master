<div role="main" class="main shop">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-12">
						<h2><a href="type/2-san-pham-moi">New <strong>Product</strong></a></h2>
</div>
<ul class="products product-thumb-info-list">
<?php if (empty($newProducts)) : ?>
<h3 class="col-sm-12">There are no products in this category.</h3>
						<?php endif; ?>
						<?php foreach ($newProducts as $newProduct) : ?>
							<li class="col-sm-3 col-xs-12 product">
								<?php if ($newProduct['saleoff'] != 0) : ?>
									<a href="type/3-san-pham-dang-giam-gia">
										<span class="onsale">-<?= $newProduct['percentoff']; ?>%</span>
									</a>
								<?php endif; ?>
								<span class="product-thumb-info">
									<form action="cart/add/<?= $newProduct['id']; ?>" method="post">
										<input type="hidden" name="number_cart" value="1">
										<a class="add-to-cart-product"><button type="submit" href="cart/add/<?= $newProduct['id']; ?>"><i class="fa fa -shopping-cart"></i> Add to cart</button></a>
</form>
<a href="product/<?= $newProduct['id']; ?>-<?= $newProduct['slug']; ?>">
<span class="product-thumb-info-image">
<span class="product-thumb-info-act">
<span class="product-thumb-info-act-left"><em>Views</em></span>
<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
											</span>
											<img alt="<?=$newProduct['product_name']?>" class="img-responsive" src="public/upload/products/<?= $newProduct['img1']; ?>">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="product/<?= $newProduct['id']; ?>-<?= $newProduct['slug']; ?>/">
											<h4 title="<?= $newProduct['product_name']; ?>"><?php if (strlen($newProduct['product_name']) > 50) {
											    echo substr($newProduct['product_name'], 0, 57) . '...';
											} else {
											    echo $newProduct['product_name'];
											}  ?></h4>
											<span class="price">
												<?php if ($newProduct['saleoff'] != 0) { ?>
													<del title="<?= $newProduct['product_name']; ?>"><span class="amount"><?= number_format($newProduct['product_price'], 0, ',', '.');  ?></span></del>
													<ins title="<?= $newProduct['product_name']; ?>"><span class="amount"><?= number_format(($newProduct['product_price']) - (($newProduct['product_price'] * $newProduct['percentoff']) / 100), 0, ',', '.'); ?> TND</span></ins>
												<?php } else { ?>
													<ins><span class="amount"><?= number_format($newProduct['product_price'], 0, ',', '.');  ?> TND</span></ins>
												<?php } ?>
											</span>
										</a>
									</span>
								</span>
							</li>
						<?php endforeach; ?>
					</ul>
					<div style="text-align: center;" class="col-md-12">
						<a href="type/2-san-pham-moi" class="btn btn-primary">See more →</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
