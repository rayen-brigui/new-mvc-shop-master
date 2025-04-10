<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2><?php ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= PATH_URL . 'home' ?>"><i class="zmdi zmdi-home"></i> MW Jewls</a></li>
                        <li class="breadcrumb-item"><a href="admin.php?controller=header-footer">Contact</a></li>
                        <li class="breadcrumb-item active"><?= $contact ? '' . $contact['contact_name'] : ''; ?></li>
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
                         <strong><?= $contact ? 'Warning: </strong> You are in the edit page of the header-footer section "' . $contact['contact_name'] . '", Be careful!!! <a target="_blank" href="#"> See documentation</a>' : 'Warning: </strong> You are on the page to create a new contact, Be careful!!! <a target="_blank" href="#"> See documentation</a>'; ?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                 <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                             </button>
                     </div>
                     <div class="card">
                         <div class="body">
                             <form id="contact-form" class="form-horizontal" method="post" action="admin.php?controller=header-footer" enctype="multipart/form-data" role="form">
                                 <input name="contact_id" type="hidden" value="<?= $contact ? $contact['id'] : '0'; ?>" />
                                 <h2 class="card-inside-title" style="font-weight:bold;">Contact name:</h2>
                                 <div class="row clearfix">
                                     <div class="col-sm-12">
                                         <div class="form-group">
                                             <input name="name" type="text" maxlength="255" value="<?= $contact ? $contact['contact_name'] : ''; ?>" class="form-control" id=" name" placeholder="Enter contact name..." required="" />
                                         </div>
                                     </div>
                                 </div>
                                 <br>
                                 <h1 class="card-inside-title" style="font-weight:bold; font-size:2em; text-align:center;">Header:</h1>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Change Icon Favicon Web</h2>
                                         </div>
                                         <div class="body">
                                             <input name="favicon" type="file" class="form-control dropify">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Current Favicon Icon</h2>
                                         </div>
                                         <div style="text-align: center;" class="body">
                                             <img style="max-width:320px;" src="public/img/<?= $contact['favicon']; ?>">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Change Image Web Logo</h2>
                                         </div>
                                         <div class="body">
                                             <input name="logo" type="file" class="form-control dropify">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Current Logo Image</h2>
                                         </div>
                                         <div style="text-align: center;" class="body">
                                             <img style="max-width:320px;" src="public/img/<?= $contact['link_Logo']; ?>">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Country</h2>
                                        </div>
                                    <div class="body">
                                             <input name="country" value="<?= $contact['country'] ?>" type="text" class="form-control" placeholder="Enter country...">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Phone number</h2>
                                         </div>
                                         <div class="body">
                                             <input name="phone" maxlength="20" pattern="[0-9\.]+" value="<?= $contact['phone'] ?>" type="text" class="form- control" required placeholder="Enter phone...">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Secondary phone number</h2>
                                         </div>
                                         <div style="text-align: center;" class="body">
                                             <input type="text" value="<?= $contact['phone_2'] ?>" pattern="[0-9\.]+" maxlength="20" name="phone_2" class="form- control" required placeholder="Enter phone...">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">About page link</h2>
                                         </div>
                                         <div class="body">
                                             <input name="link_about" value="<?= $contact['link_about'] ?>" type="text" maxlength="255" class="form-control" required placeholder="Enter link..." >
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Contact page link</h2>
                                         </div>
                                         <div style="text-align: center;" class="body">
                                             <input type="text" value="<?= $contact['link_Contact'] ?>" maxlength="550" name="link_Contact" class="form-control" required placeholder="Enter link..." >
                                         </div>
                                     </div>
                                 </div>
                                 <hr>
                                 <br>
                                 <h1 class="card-inside-title" style="font-weight:bold; font-size:2em; text-align:center;">Footer:</h1>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Email Address</h2>
                                         </div>
                                         <div class="body">
                                             <input name="email" value="<?= $contact['email'] ?>" maxlength="255" type="email" class="form-control" required placeholder="Enter country..." >
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Address</h2>
                                        </div>
                                        <div style="text-align: center;" class="body">
                                             <input type="text" value="<?= $contact['address'] ?>" name="address" maxlength="500" class="form-control" required placeholder="Enter address... ">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Facebook page link</h2>
                                         </div>
                                         <div class="body">
                                             <input name="link_Facebook" value="<?= $contact['link_Facebook'] ?>" type="text" class="form-control" required placeholder="Enter link...">
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Linkedin page link</h2>
                                         </div>
                                         <div style="text-align: center;" class="body">
                                             <input type="text" value="<?= $contact['link_linkedin'] ?>" maxlength="250" name="link_linkedin" class="form-control" required placeholder="Enter link..." >
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="card col-md-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Twitter page link</h2>
                                         </div>
                                         <div class="body">
                                             <input name="link_Twitter" value="<?= $contact['link_Twitter'] ?>" maxlength="250" type="text" class="form-control" required placeholder="Enter link..." >
                                         </div>
                                     </div>
                                     <div class="col-sm-6">
                                         <div class="header">
                                             <h2 style="text-align: center;">Zalo phone number</h2>
                                         </div>
                                         <div style="text-align: center;" class="body">
                                             <input type="text" value="<?= $contact['zalo'] ?>" name="zalo" class="form-control" placeholder="Enter required phone number...">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row clearfix">
                                     <div class="col-md-12">
                                         <div class="form-group">
                                             <textarea class="form-control" name="about_footer" placeholder="Enter introduction..." id=""><?= $contact['about_footer'] ?></textarea>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="form-group" style="text-align: center;">
                                     <button class="btn btn-primary waves-effect" type="submit"><?= $contact ? 'Update header footer' : ''; ?></button>
                                     <a class="btn btn-warning waves-effect" href="admin.php">Back</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
