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
                    <h2><?php ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=user&action=listall">User</a></li>
                        <li class="breadcrumb-item active">Change Password</li>
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
                      <strong>You are changing your password, please be careful!!! <a target="_blank" href="#"> See documentation</a>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="product-form" class="form-horizontal" method="post" action="admin.php?controller=user&action=result" enctype="multipart/form-data" role="form">
                                <input name="id_change" type="hidden" value="<?= $user_info ? $user_info['id'] : '0'; ?>" />
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                     <h2 class="card-inside-title" style="font-weight:bold;">Current password:</h2>
                                         <div class="row clearfix">
                                             <div class="col-sm-12">
                                                 <div class="form-group">
                                                     <input name="currentPassword" type="password" maxlength="50" value="" class="form-control" placeholder="Example: tanhongit" required="" />
                                                 </div>
                                             </div>
                                         </div>
                                         <h2 class="card-inside-title" style="font-weight:bold;">New password:</h2>
                                         <div class="row clearfix">
                                             <div class="col-sm-12">
                                                 <div class="form-group">
                                                     <input name="newPassword" type="password" value="" maxlength="50" class="form-control" placeholder="Enter password..." required="" />
                                                 </div>
                                             </div>
                                         </div>
                                         <h2 class="card-inside-title" style="font-weight:bold;">Confirm new password:</h2>
                                         <div class="row clearfix">
                                             <div class="col-sm-12">
                                                 <div class="form-group">
                                                     <input name="confirmPassword" type="password" value="" maxlength="50" class="form-control" placeholder="Confirm password..." required="" />
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <br><br>
                                 <div class="form-group" style="text-align: center;">
                                     <button class="btn btn-primary waves-effect" type="submit">Confirm change to new password</button>
                                     <a class="btn btn-warning waves-effect" href="admin.php?controller=user&action=info&amp;user_id=<?= $user_info['id']; ?>">Back</a>
                                 </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>
