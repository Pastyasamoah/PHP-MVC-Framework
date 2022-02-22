
<!-- Page-header end -->
<div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">

                    <?php if( !is_null($Response)): ?>
                        <div class="col-12">
                            <div class="card border-0">
                                <?php if(is_array($Response) ): ?>
                                    <div class="card-header bg-danger border-0">
                                         <?php foreach($Response as $Error): ?>
                                            <p><?=$Error;?></p>
                                         <?php endforeach;?>
                                    </div>
                                <?php else:?>
                                     <div class="card-header bg-success border-0">
                                        <p><?=$Response;?></p>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endif;?>


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                 <h5><?=$Heading;?></h5> 
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li><i class="fa fa fa-wrench open-card-option"></i></li>
                                        <li><i class="fa fa-window-maximize full-card"></i></li>
                                        <li><i class="fa fa-minus minimize-card"></i></li>
                                        <li><i class="fa fa-refresh reload-card"></i></li>
                                        <li><i class="fa fa-trash close-card"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block">
                                <div id="sales-analytics">
                                   <div class="row">
                                   <div class="col-lg-4 col-md-4">
                                        <div class="card border-0">
                                            <center>
                                            <?php if($Data->ProfilePicture == ""): ?>
                                                <img class="img-fluid img-responsive img-circle card-img-top" 
                                                     src="<?=$ImagesDir;?>/SystemImages/avatar.png" 
                                                     style="max-width:100px"/>
                                            <?php else:?>
                                                <img class="img-fluid img-responsive img-thumbnail card-img-top" 
                                                     src="<?=$ImagesDir;?>/UsersImages/<?=$Data->ProfilePicture;?>" 
                                                     style="max-width:150px"/>
                                            <?php endif;?>
                                            
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item"><?=$Data->Name;?></li>
                                                <li class="list-group-item"><?=$Data->Contact;?></li>
                                                <li class="list-group-item"><?=$Data->Email;?></li>
                                            </ul>
                                            </center>
                                        </div>
                                  </div>

                                    <div class="col-lg-8 col-md-8">
                                        <div class="card border-0">
                                                <!--  -->
                                                <div class="row">
                                                     <div class="col-lg-12">
                                                        <div class="card border-0">
                                                            <div class="card-header">
                                                                <h5>Name</h5>
                                                            </div>
                                                            <div class="card-block">
                                                                <form action="" method="POST" enctype="multipart/form-data" class="form-material">

                                                                    <div class="form-group form-default">
                                                                        <input type="file" name="ProfilePicture" class="form-control">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Profile Picture **</label>
                                                                    </div>

                                                                    <div class="form-group form-default">
                                                                        <input type="text" name="Name" class="form-control" value="<?=$Data->Name;?>" required="">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Name **</label>
                                                                    </div>

                                                                     <div class="form-group form-default">
                                                                        <input type="text" name="Contact" class="form-control" value="<?=$Data->Contact;?>" required="">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Contact **</label>
                                                                    </div>

                                                                     <div class="form-group form-default">
                                                                        <input type="Email" name="Email" class="form-control" value="<?=$Data->Email;?>" required="">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Email **</label>
                                                                    </div>

                                                                     <div class="form-group form-default">
                                                                        <input type="password" name="Password" class="form-control">
                                                                        <span class="form-bar"></span>
                                                                        <label class="float-label">Create New Password</label>
                                                                    </div>

                                                                    <button type="submit" name="EditProfile" class="btn btn-success">
                                                                        Save Changes
                                                                    </button>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
                                        </div>
                                    </div>
                                 </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>

