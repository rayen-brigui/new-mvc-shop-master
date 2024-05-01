<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><?php ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></li>
                       <li class="breadcrumb-item"><a href="admin.php?controller=category">Subcategories</a></li>
                         <li class="breadcrumb-item active"><?= $subcategory ? 'Update subcategory: ' . $subcategory['subcategory_name'] : 'Add new subcategory'; ?></li>
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
                        <strong><?= $subcategory ? 'Warning: </strong> You are in the edit page of the category group "' . $subcategory['subcategory_name'] . '", Be careful!!! <a target="_blank" href="#"> See documentation</a>' : 'Warning: </strong> You are in the page of creating a new category group, Be careful!!! <a target="_blank" href="#"> See documentation</a>'; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
                                <input name="sub_cate_id" type="hidden" value="<?= $subcategory ? $subcategory['id'] : '0'; ?>" />
                                <h2 class="card-inside-title" style="font-weight:bold;">Subcategory name:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="name" type="text" value="<?= $subcategory ? $subcategory['subcategory_name'] : ''; ?>" class="form-control" id="name" placeholder=" Enter the product name of the category group..." required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Slug (Subcategory path):</h2>
                                 <p>The link will automatically be created to match the category name...</p>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="slug" type="text" value="<?= $subcategory ? $subcategory['slug'] : ''; ?>" class="form-control" id="slug" placeholder=" The link will automatically be created to match the category name..." required="" disabled />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">select Dependency with parent category group:</h2>
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
                                <br><br>
                               <div class="form-group" style="text-align: center;">
                                     <button class="btn btn-primary waves-effect" type="submit"><?= $subcategory ? 'Update subcategory above' : 'Add new subcategory'; ?></button>
                                     <a class="btn btn-warning waves-effect" href="admin.php?controller=category">Back</a>
                                 </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
