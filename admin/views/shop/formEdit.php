<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><?php ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=shop">Category group</a></li>
                         <li class="breadcrumb-item active"><?= $category ? 'Update category group: '. $category['category_name'] : 'Add new category group'; ?></li>
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
                         <strong><?= $category ? 'Warning: </strong> You are in the edit page of the category group "'.$category['category_name'].'", Be careful!!! <a target="_blank" href="#"> See documentation</a>' : 'Warning: </strong> You are in the page of creating a new category group, Be careful!!! <a target="_blank" href="#"> See documentation</a>'; ?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                             </button>
                     </div>
                     <div class="card">
                         <div class="body">
                             <form id="product-form" class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
                                 <input name="cate_id" type="hidden" value="<?= $category ? $category['id'] : '0'; ?>" />
                                 <h2 class="card-inside-title" style="font-weight:bold;">Category group name:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="name" type="text" maxlength="255" value="<?= $category ? $category['category_name'] : ''; ?>" class="form-control" id=" name" placeholder="Enter the product name of the category group..." required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Slug (Category group path):</h2>
                                 <p>The link will automatically be created to match the category name...</p>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                       <input name="slug" type="text" maxlength="255" value="<?= $category ? $category['slug'] : ''; ?>" class="form-control" id=" slug" placeholder="The link will automatically be created to match the category name..." required="" disabled/>
                                         </div>
                                     </div>
                                 </div>
                                 <h2 class="card-inside-title" style="font-weight:bold;">Position order:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="position" type="text" maxlength="4" value="<?= $category ? $category['category_position'] : ''; ?>" class="form-control" id=" slug" placeholder="Category position on data table..." pattern="[0-9]+" required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <br><br>
                                 <div class="form-group" style="text-align: center;">
                                     <button class="btn btn-primary waves-effect" type="submit"><?= $category ? 'Update above category group' : 'Add new category group'; ?></button>
                                     <a class="btn btn-warning waves-effect" href="admin.php?controller=shop">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
