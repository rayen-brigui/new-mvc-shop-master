<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><?php ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></li>
                        <li class="breadcrumb-item"><a href="admin.php">Blog</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=post">Post</a></li>
                        <li class="breadcrumb-item active">Add new article</li>
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
                        <strong><?= 'Warning: </strong> You are on the page adding new posts, Be careful!!! <a target="_blank" href="#"> See documentation</a>'; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                            </button>
                    </div>
                    <div class="card">
                        <div class="body">
                            <form id="post-form" class="form-horizontal" method="post" action="admin.php?controller=post&amp;action=add" enctype="multipart/form-data" role="form">
                                <div class="row clearfix">
                                    <div class="col-sm-8">
                                        <input name="post_id" type="hidden" value="<?= $post ? $post['id'] : '0'; ?>" />
                                        <?php global $userNav;
                    $get_user_by = getRecord('users', $userNav) ?>
                                        <?php if (isset($post)) : ?>
                                            <input name="editby" type="hidden" value="<?= $get_user_by['user_name']; ?>" /><?php else : ?>
                                            <input name="createby" type="hidden" value="<?= $get_user_by['id']; ?>" /><?php endif; ?>
                                        <h2 class="card-inside-title" style="font-weight:bold;">Article title:</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                               <div class="form-group">
                                                     <input name="title" type="text" value="<?= $post ? $post['post_title'] : ''; ?>" class="form-control" id="name" placeholder=" Enter article title..." required="" />
                                                 </div>
                                            </div>
                                        </div>
                                      <h2 class="card-inside-title" style="font-weight:bold;">Slug (Article link):</h2>
                                        <div class="row clearfix">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                   <input name="slug" type="text" value="<?= $post ? $post['post_slug'] : ''; ?>" class="form-control" id="slug" placeholder=" Enter the article link..." required="" />
                                                 </div>
                                             </div>
                                         </div>
                                         <h2 class="card-inside-title" style="font-weight:bold;">Content:</h2>
                                         <div class="row clearfix">
                                             <div class="col-sm-12">
                                                 <div class="form-group">
                                                     <textarea class="form-control" name="detailpost" id="ckeditor"><?= $post ? $post['post_content'] : ''; ?></textarea>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-sm-4">
                                         <?php if (isset($post)) : ?>
                                             <div class="row clearfix">
                                                 <div>
                                                     <div>
                                                         <h4 style="text-align: center;">Current profile picture</h4>
                                                         <img style="text-align: center;" style="max-width:250px;" src="public/upload/ckeditorimages/<?= $post['post_avatar']; ?>">
                                                     </div>
                                                 </div>
                                             </div>
                                         <?php endif; ?>
                                         <hr>
                                         <h2 style="text-align: center;">Add new photo</h2>
                                         <div class="card col-md-12">
                                             <div class="header" style="text-align: center;">
                                                 <h2 style="text-align: center;">Representative Image</h2>
                                             </div>
                                             <div class="body">
                                                 <input name="post_avatar" type="file" class="form-control dropify" accept="image/*">
                                             </div>
                                         </div>
                                         <h2 class="card-inside-title" style="font-weight:bold;">Post views:</h2>
                                         <div class="row clearfix">
                                             <div class="col-sm-12">
                                                 <div class="form-group">
                                                     <input name="totalview" type="text" value="<?= $post ? $post['totalView'] : 0; ?>" class="form-control" id="totalview" placeholder="Count view..." />
                                                 </div>
                                             </div>
                                         </div>
                                         <div class="form-group" style="text-align: center;">
                                             <button class="btn btn-primary waves-effect" type="submit"><?= $post ? 'Update article' : 'Add new article'; ?></button>
                                             <a class="btn btn-warning waves-effect" href="admin.php?controller=post">Back</a>
                                         </div>
                                    </div>
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
    CKEDITOR.replace('detailpost', {
        height: '800px'
    });
</script>
