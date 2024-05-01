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
                 <h2>Access rights</h2>
                     <ul class="breadcrumb">
                         <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></ li>
                         <li class="breadcrumb-item"><a href="admin.php?controller=slide">Slides</a></li>
                         <li class="breadcrumb-item active">List of Slides displaying Homepage</li>
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
                             <h2><strong>Data Retrieval</strong> "Corresponding Images Slides" </h2>
                             <ul class="header-dropdown">
                                 <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> < /a>
                                     <ul class="dropdown-menu dropdown-menu-right slideUp">
                                         <li><a href="admin.php?controller=slide&action=edit">Add Slide</a></li>
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
                                             <th>Slide Name</th>
                                             <th>Image 1</th>
                                             <th>Image 2</th>
                                             <th>Image 3</th>
                                             <th>Image 4</th>
                                             <th>Image 5</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>ID</th>
                                             <th>Slide Name</th>
                                             <th>Image 1</th>
                                             <th>Image 2</th>
                                             <th>Image 3</th>
                                             <th>Image 4</th>
                                             <th>Image 5</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($slides as $slide) : ?>
                                            <tr>
                                                <td><?= $slide['id'] ?></td>
                                                <td><?= $slide['slide_name'] ?></td>
                                                <?php for ($i = 1; $i < 6; $i++) : ?>
                                                    <td><?= '<image src="public/upload/slides/' . $slide['slide_img' . $i] . '?time=' . time() . '" style="max-width:50px;" /><br>'  . $slide['slide_img' . $i] ?></td>
                                                <?php endfor; ?>
                                                <td><a href="admin.php?controller=slide&amp;action=edit&amp;slide_id=<?= $slide['id']; ?>" class="btn btn-warning waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="admin.php?controller=slide&amp;action=delete&amp;slide_id=<?= $slide['id']; ?>" class="btn btn-danger waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                         <h2><strong>Data Retrieval</strong> "Text corresponding to Slides" </h2>
                             <ul class="header-dropdown">
                                 <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> < /a>
                                     <ul class="dropdown-menu dropdown-menu-right slideUp">
                                         <li><a href="admin.php?controller=slide&action=edit">Add Slide</a></li>
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
                                             <th>Slide Name</th>
                                             <th>Text 1</th>
                                             <th>Text 2</th>
                                             <th>Text 3</th>
                                             <th>Text 4</th>
                                             <th>Text 5</th>
                                             <th>Action</th>
                                         </tr>
                                     </thead>
                                     <tfoot>
                                         <tr>
                                             <th>ID</th>
                                             <th>Slide Name</th>
                                             <th>Text 1</th>
                                             <th>Text 2</th>
                                             <th>Text 3</th>
                                             <th>Text 4</th>
                                             <th>Text 5</th>
                                             <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php foreach ($slides as $slide) : ?>
                                            <tr>
                                                <td><?= $slide['id'] ?></td>
                                                <td><?= $slide['slide_name'] ?></td>
                                                <?php for ($i = 1; $i < 6; $i++) : ?>
                                                    <td><?= $slide['slide_text' . $i] ?></td>
                                                <?php endfor; ?>
                                                <td><a href="admin.php?controller=slide&amp;action=edit&amp;slide_id=<?= $slide['id']; ?>" class="btn btn-warning waves-effect waves-float btn-sm waves-green"><i class="zmdi zmdi-edit"></i></a>
                                                    <a onclick="return confirm('Are you sure to delete?')" href="admin.php?controller=slide&amp;action=delete&amp;slide_id=<?= $slide['id']; ?>" class="btn btn-danger waves-effect waves-float btn-sm waves-red"><i class="zmdi zmdi-delete"></i></a></td>
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
