<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><?php ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=product">Product</a></li>
                      <li class="breadcrumb-item active"><?= $product ? 'Product update: ' . $product['product_name'] : 'Add new product'; ?></li>
                    </ul>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <!-- Input -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="alert alert-warning" role="alert">
                        <strong><?= $product ? 'Warning: </strong> You are in the edit page of the product "' . $product['product_name'] . '", Be careful!!! <a target="_blank" href="#"> See documentation</a>' : 'Warning: </strong> You are on the page to create a new product, Be careful!!! <a target="_blank" href="#"> See documentation</a>'; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <?php if (isset($product)) { ?>
                        <div class="col-lg-12">
                            <div class="card col-md-12">
                               <h3>Product information</h3>
                                 <table id="info" class="table">
                                     <tr>
                                         <td><strong>Product name</strong></td>
                                         <td><?= $product['product_name']; ?></td>
                                     </tr>
                                     <tr>
                                         <td><strong>Product type</strong></td>
                                         <td><?php foreach ($types as $type) {
                                             if ($product && ($product['product_typeid'] == $type['id'])) {
                                                 echo $type['type_name'];
                                             }
                                         } ?></td>
                                     <tr></tr>
                                     <td><strong>Belongs to a category group</strong> </td>
                                     <td><?php foreach ($categories as $category) {
                                         if ($product && ($product['category_id'] == $category['id'])) {
                                             echo $category['category_name'];
                                         }
                                     } ?></td>
                                     </tr>
                                     <tr>
                                         <td><strong>Belongs to subcategory</strong> </td>
                                         <td><?php foreach ($subCategoryData as $subcategory) {
                                             if ($product && ($product['sub_category_id'] == $subcategory['id'])) {
                                                 echo $subcategory['subcategory_name'];
                                             }
                                        } ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Color</strong> </td>
                                        <td><?= $product['product_color']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Size</strong> </td>
                                        <td><?= $product['product_size']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Material</strong> </td>
                                        <td><?= $product['product_material']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Total View</strong> </td>
                                        <td><?= $product['totalView']; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Price</strong> </td>
                                        <td><?= $product['product_price']; ?> TND</td>
                                    </tr>
                                    <?php if ($product['saleoff'] == 1) { ?>
                                        <tr>
                                            <td><strong>Percent Off</strong> </td>
                                            <td><?= $product['percentoff']; ?> %</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Price (Sale)</strong> </td>
                                            <td><?= $product['product_price'] - $product['product_price'] * $product['percentoff'] / 100; ?> TND</td>
                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=product&amp;action=edit" enctype="multipart/form-data" role="form">
                                <input name="product_id" type="hidden" value="<?= $product ? $product['id'] : '0'; ?>" />
                                <?php global $userNav;
                    $get_user_by = getRecord('users', $userNav) ?>
                                <?php if (isset($product)) : ?>
                                    <input name="editby" type="hidden" value="<?= $get_user_by['user_name']; ?>" />
                                    <input name="createby" type="hidden" value="<?= $product['createBy']; ?>" />
                                <?php else : ?>
                                    <input name="createby" type="hidden" value="<?= $get_user_by['user_name']; ?>" /><?php endif; ?>
                                <h2 class="card-inside-title" style="font-weight:bold;">Product's name:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                           <input name="name" max='500' type="text" value="<?= $product ? $product['product_name'] : ''; ?>" class="form-control" id=" name" placeholder="Enter product name..." required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Slug (Product link):</h2>
                                 <p>The link will automatically be created to match the category name...</p>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="slug" type="text" value="<?= $product ? $product['slug'] : ''; ?>" class="form-control" id="slug" placeholder=" Enter the product link..." />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Product Type:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <select name="type_id" class="form-control show-tick">
                                             <?php foreach ($types as $type) {
                                                 $selected = '';
                                                 if ($product && ($product['product_typeid'] == $type['id'])) {
                                                     $selected = 'selected=""';
                                                 }
                                                 echo '<option value="' . $type['id'] . '" ' . $selected . '>' . $type['type_name'] . '</option>';
                                             } ?>
                                         </select>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Category Group:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <select name="category_id" class="form-control show-tick">
                                            <?php foreach ($categories as $category) {
                                                $selected = '';
                                                if ($product && ($product['category_id'] == $category['id'])) {
                                                    $selected = 'selected=""';
                                                }
                                                echo '<option value="' . $category['id'] . '" ' . $selected . '>' . $category['category_name'] . '</option>';
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                               <h2 class="card-inside-title" style="font-weight:bold;">SubCategory:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <select name="subcategory_id" class="form-control show-tick">
                                             <?php foreach ($subCategoryData as $subcategory) {
                                                 $selected = '';
                                                 if ($product && ($product['sub_category_id'] == $subcategory['id'])) {
                                                     $selected = 'selected=""';
                                                 }
                                                 echo '<option value="' . $subcategory['id'] . '" ' . $selected . '>' . $subcategory['subcategory_name'] . '</option>';
                                             } ?>
                                         </select>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Product Price:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="price" type="type" maxlength="11" value="<?= $product ? $product['product_price'] : 0; ?>" class="form-control" id="price " placeholder="0" pattern="[0-9\.]+" required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Product color:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="color" type="text" maxlength="250" value="<?= $product ? $product['product_color'] : ''; ?>" class="form-control" id=" color" placeholder="Color..." required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Size for product:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="size" type="text" required maxlength="100" value="<?= $product ? $product['product_size'] : ''; ?>" class="form-control" id= "size" placeholder="Size ..." />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Product material:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="material" type="text" maxlength="250" value="<?= $product ? $product['product_material'] : ''; ?>" class="form-control" id="material" placeholder="Material ..." required="" />
                                        </div>
                                    </div>
                                </div>
                               <h2 class="card-inside-title" style="font-weight:bold;">Product views:</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="totalview" pattern="[0-9\.]+" type="text" maxlength="11" value="<?= $product ? $product['totalView'] : ''; ?>" class="form-control" id="totalview" placeholder="Views..." />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Discount options (Sale off):</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php if (isset($product)) : ?>
                                                <div class="radio inlineblock m-r-20">
                                                    <input type="radio" name="status" id="male" class="with-gap" value="1" <?php if ($product['saleoff'] == "1") {
                                                        echo "checked";
                                                    } ?>>
                                                   <label for="male">Enable discounts</label>
                                                 </div>
                                                 <div class="radio inlineblock">
                                                     <input type="radio" name="status" id="Female" class="with-gap" <?php if ($product['saleoff'] == "0") {
                                                         echo "checked";
                                                     } ?> value="0">
                                                     <label for="Female">No discount</label>
                                                 </div>
                                             <?php else : ?>
                                                 <div class="radio inlineblock m-r-20">
                                                     <input type="radio" name="status" id="male" class="with-gap" value="1">
                                                     <label for="male">Enable discounts</label>
                                                 </div>
                                                 <div class="radio inlineblock">
                                                     <input type="radio" name="status" id="Female" class="with-gap" checked value="0">
                                                     <label for="Female">No discount</label>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Product discount % (from 0 -> 100 and only enter if "enable discount" is selected):</h2>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input name="percent_off" type="text" maxlength="11" value="<?= $product ? $product['percentoff'] : ''; ?>" class="form-control" id="percent_off" pattern="[0-9\.]+" placeholder="Number Precent Off ..." />
                                        </div>
                                    </div>
                                </div>
                                <h2 class="card-inside-title" style="font-weight:bold;">Select the new product creation date:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-4">
                                         <input name="createdate" id="createdate" type="date" value="<?= $product ? $product['createDate'] : date('d/m/Y'); ?>" class= "form-control" placeholder="Please choose date & time...">
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Basic information about the product:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <textarea class="form-control" name="description" placeholder="Product information..."><?= $product ? $product['product_description'] : ''; ?></textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Product details:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <textarea class="form-control" name="detail" id="ckeditor" placeholder="Product details..."><?= $product ? $product['product_detail'] : ''; ?></textarea>
                                         </div>
                                     </div>
                                 </div>
                                <?php if (isset($product)) : ?>
                                    <div class="row clearfix">
                                        <div style="text-align: center;" class="col-lg-3 col-md-4">
                                            <div>
                                              <h4>Representative image</h4>
                                                 <?php if (strlen($product['img1']) <> 0) { ?>
                                                     <img style="max-width:250px;" src="public/upload/products/<?= $product['img1']; ?>">
                                                 <?php } else {
                                                     echo '<h6>This location has no images</h6>';
                                                 } ?>
                                             </div>
                                         </div>
                                         <div style="text-align: center;" class="col-lg-3 col-md-4">
                                             <div>
                                                 <h4>Photo 2</h4>
                                                 <?php if (strlen($product['img2']) <> 0) { ?>
                                                     <img style="max-width:250px;" src="public/upload/products/<?= $product['img2']; ?>">
                                                 <?php } else {
                                                     echo '<h6>This location has no images</h6>';
                                                 } ?>
                                             </div>
                                         </div>
                                         <div style="text-align: center;" class="col-lg-3 col-md-4">
                                             <div>
                                                 <h4>Photo 3</h4>
                                                 <?php if (strlen($product['img3']) <> 0) { ?>
                                                     <img style="max-width:250px;" src="public/upload/products/<?= $product['img3']; ?>">
                                                 <?php } else {
                                                     echo '<h6>This location has no images</h6>';
                                                 } ?>
                                             </div>
                                         </div>
                                         <div style="text-align: center;" class="col-lg-3 col-md-4">
                                             <div>
                                                 <h4>Photo 4</h4>
                                                 <?php if (strlen($product['img4']) <> 0) { ?>
                                                     <img style="max-width:250px;" src="public/upload/products/<?= $product['img4']; ?>">
                                                 <?php } else {
                                                     echo '<h6>This location has no images</h6>';
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <hr>
                               <h2>Change the image as you like</h2>
                                 <div class="card col-md-2">
                                     <div class="header">
                                         <h2 style="text-align: center;">Representative Image</h2>
                                     </div>
                                     <div class="body">
                                         <input name="img1" type="file" class="form-control dropify" accept="image/*">
                                     </div>
                                 </div>
                                 <div class="card col-md-2">
                                     <div class="header">
                                         <h2 style="text-align: center;">Photo 2</h2>
                                     </div>
                                     <div class="body">
                                         <input name="img2" type="file" class="form-control dropify">
                                     </div>
                                 </div>
                                 <div class="card col-md-2">
                                     <div class="header">
                                         <h2 style="text-align: center;">Photo 3</h2>
                                     </div>
                                     <div class="body">
                                         <input name="img3" type="file" class="form-control dropify">
                                     </div>
                                 </div>
                                 <div class="card col-md-2">
                                     <div class="header">
                                         <h2 style="text-align: center;">Photo 4</h2>
                                     </div>
                                     <div class="body">
                                         <input name="img4" type="file" class="form-control dropify">
                                     </div>
                                 </div>
                                 <br><br>
                                 <div class="form-group" style="text-align: center;">
                                     <button class="btn btn-primary waves-effect" type="submit"><?= $product ? 'Update product on' : 'Add new product'; ?></button>
                                     <a class="btn btn-warning waves-effect" href="admin.php?controller=product">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="admin/themes/plugins/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="admin/themes/plugins/ckfinder/ckfinder.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('detail', {
        height: '800px'
    });
</script>
