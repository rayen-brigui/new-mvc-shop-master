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
                   <h2>Category group</h2>
                     <ul class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></ li>
                         <li class="breadcrumb-item"><a href="admin.php?controller=shop">Category groups</a></li>
                         <li class="breadcrumb-item active">Category group list</li>
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
                        <h2><strong>Data Retrieval</strong> "Category Group" </h2>
                             <ul class="header-dropdown">
                                 <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> < /a>
                                     <ul class="dropdown-menu dropdown-menu-right slideUp">
                                         <li><a href="admin.php?controller=shop&action=edit">Add Category Group</a></li>
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
                                             <th>ID</th>
                                             <th>Category Group Name</th>
                                             <th>Link</th>
                                             <th>Order - position</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>ID</th>
                                             <th>Category Group Name</th>
                                             <th>Link</th>
                                             <th>Order - position</th>
                                             <th>Action</th>
                                         </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($categories as $category) : ?>
                                            <tr>
                                                <td><?= $category['id'] ?></td>
                                                <td><a href="admin.php?controller=shop&amp;action=edit&amp;cate_id=<?= $category['id']; ?>"><?= $category['category_name']; ?></a></td>
                                                <td><?= $category['slug'] ?></td>
                                                <td><?= $category['category_position'] ?></td>
                                                <td><a href="shop/<?= $category['id']; ?>-<?= $category['slug'] ?>" target="_blank" class="btn btn-success waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-eye"></i></a>
                                                    <a href="admin.php?controller=shop&amp;action=edit&amp;cate_id=<?= $category['id']; ?>" class="btn btn-warning waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="admin.php?controller=shop&amp;action=delete&amp;cate_id=<?= $category['id'] ?>" class="btn btn-danger waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require('admin/views/shared/footer.php'); ?>
