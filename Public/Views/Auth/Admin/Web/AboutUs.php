
<!-- All Modals First -->
<!-- Add user Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Board Member</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
             <div class="col-12">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>Account Details</h5>
                    </div>
                    <div class="card-block">
                        <form action="" method="POST" enctype="multipart/form-data"  class="form-material">

                            <div class="form-group form-default">
                                <input type="text" name="BoardMemberName" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Name **</label>
                            </div>

                            <div class="form-group form-default">
                             <label class="float-label">Profile Picture</label>
                                 <div class="form-group form-default">
                                    <input type="file" name="BoardMemberProfilePicture" class="form-control">
                                 </div>
                            </div>

                            <div class="form-group form-default">
                                <input type="number" name="BoardMemberContact" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Contact **</label>
                            </div>

                            <div class="form-group form-default">
                                <input type="email" name="BoardMemberEmail" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Email **</label>
                            </div>

                            <div class="form-group form-default">
                                <textarea name="BoardMemberProfile" class="form-control" placeholder="Enter profile..." required></textarea>
                            </div>
                            <br><br>
                            <div class="col-12">
                                <small>
                                   <input type="submit" name="SaveBoardMember" class="btn btn-success btn-lg" value="Add Board Member">
                                 </small>
                            </div>
                         </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End user modal -->


<!-- Edit modal -->

<?php function EditBoard($Data, $ImagesDir){; ?>

<div class="modal fade" id="staticBackdropEdit<?=$Data->AboutID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit <?=$Data->BoardMemberName;?> Records</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
             <div class="col-12">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>Account Details Update</h5>
                    </div>
                    <div class="card-block">

                        <form action="" method="POST" enctype="multipart/form-data" class="form-material">

                            <div class="form-group form-default">
                                 <center>
                                    <?php if($Data->BoardMemberProfilePicture == ""): ?>
                                        <img class="img-fluid img-responsive img-circle card-img-top" 
                                             src="<?=$ImagesDir;?>/SystemImages/avatar.png" 
                                             style="max-width:100px"/>
                                    <?php else:?>
                                        <img class="img-fluid img-responsive img-thumbnail card-img-top" 
                                             src="<?=$ImagesDir;?>/WebImages/<?=$Data->BoardMemberProfilePicture;?>" 
                                             style="max-width:130px"/>
                                    <?php endif;?>
                                </center>
                            </div>

                            <div class="form-group form-default">
                                <label class="float-label">Name **</label>
                                <input type="text" name="BoardMemberName" class="form-control" value="<?=$Data->BoardMemberName;?>" required>
                                <span class="form-bar"></span>
                            </div>

                            <div class="form-group form-default">
                             <label class="float-label">Profile Picture</label>
                                 <div class="form-group form-default">
                                    <input type="file" name="BoardMemberProfilePicture" class="form-control">
                                 </div>
                            </div>

                            <div class="form-group form-default">
                                <label class="float-label">Contact **</label>
                                <input type="number" name="BoardMemberContact" class="form-control" value="<?=$Data->BoardMemberContact;?>" required>
                                <span class="form-bar"></span>
                            </div>

                            <div class="form-group form-default">
                                <label class="float-label">Email **</label>
                                <input type="email" name="BoardMemberEmail" class="form-control" value="<?=$Data->BoardMemberEmail;?>" required>
                                <span class="form-bar"></span>
                            </div>

                            <div class="form-group form-default">
                                <textarea name="BoardMemberProfile" class="form-control" placeholder="Enter profile..." required><?=$Data->BoardMemberProfile;?></textarea>
                            </div>
                            <br><br>
                            <div class="col-12">
                                <small>
                                    <?php $Passport = md5(sha1(md5($Data->AboutID)));?>
                                    <input type="hidden" name="Passport" value="<?=$Passport;?>">
                                    <input type="hidden" name="ID" value="<?=$Data->AboutID;?>">
                                   <input type="submit" name="EditBoardMember" class="btn btn-success btn-lg" value="Save Changes">
                                 </small>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<!-- End edit modal -->



<!-- Start delete modal -->

<?php function DeleteBoardMember($Data){; ?>

<div class="modal fade" id="staticBackdropDel<?=$Data->AboutID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete <?=$Data->BoardMemberName;?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
             <div class="col-12">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>You really want to delete <span class="badge badge-info"><?=$Data->BoardMemberName;?> ??</span></h5>
                    </div>
                    <div class="card-block">
                        <form action="" method="POST" class="form-material">
                            <center>
                            <?php $Passport = md5(sha1(md5($Data->AboutID)));?>
                            <input type="hidden" name="Passport" value="<?=$Passport;?>">
                            <input type="hidden" name="ID" value="<?=$Data->AboutID;?>">
                            <input type="submit" name="DeleteBoardMember" class="btn btn-danger btn-sm text-center mr-5" value="Yes, Delete">
                            <input type="submit" class="btn btn-success btn-sm" value="Cancel">
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<!-- End delete modal -->


<!-- Edit modal -->

<?php function ViewBoardMember($Data, $ImagesDir){; ?>

<div class="modal fade" id="staticBackdropView<?=$Data->AboutID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View <?=$Data->BoardMemberName;?> Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
             
              <div class="col-lg-3 col-md-3">
                <div class="card">
                    <div class="card-header">
                      <h5><span class="fa fa-user fa-lg"></span></h5>
                    </div>
                    <div class="card-block">
                        <center>
                        <?php if($Data->BoardMemberProfilePicture == ""): ?>
                            <img class="img-fluid img-responsive img-circle card-img-top" 
                                 src="<?=$ImagesDir;?>/SystemImages/avatar.png" 
                                 style="max-width:100px"/>
                        <?php else:?>
                            <img class="img-fluid img-responsive img-thumbnail card-img-top" 
                                 src="<?=$ImagesDir;?>/WebImages/<?=$Data->BoardMemberProfilePicture;?>" 
                                 style="max-width:100px"/>
                        <?php endif;?>
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?=$Data->BoardMemberName;?></li>
                            <li class="list-group-item"><?=$Data->BoardMemberContact;?></li>
                            <li class="list-group-item"><?=$Data->BoardMemberEmail;?></li>
                        </ul>
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9">
                <div class="card">
                    <div class="card-header">
                      <h5><span class="">Profile</span></h5>
                    </div>
                    <div class="card-block">
                        <p>
                            <?=$Data->BoardMemberProfile;?>
                        </p>  
                    </div>
                </div>
            </div>


        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>

<!-- End edit modal -->
<!-- All modals end -->





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

                    <form action="" method="POST">
                                <div class="card">
                                    <div class="card-header">
                                         <h5> 
                                            <button type="submit" 
                                                    name="Interact" 
                                                    value="AboutUs"
                                                    class="badge <?php if(Session::get('Interact')=='AboutUs'){echo 'badge-success btn-lg';}else{echo 'badge-danger btn-sm';} ?>">About Us</button> |

                                            <button type="submit" 
                                                    name="Interact" 
                                                    value="Board"
                                                    class="badge <?php if(Session::get('Interact')=='Board'){echo 'badge-success btn-lg';}else{echo 'badge-danger btn-sm';} ?>">Board</button>
                                        </h5> 
                                    </div>
                                </div>
                    </form>


                    <?php if(Session::get('Interact')=='Board'):?>
                         <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                     <h5>Board Members</h5> 
                                     <?php if($Privilege->PermitCreate($AboutUs)): ?> |  
                                         <span class="badge badge-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="cursor:pointer;">
                                             Add New
                                         </span>
                                     <?php endif;?>

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

                                        <?php if( empty(@$BoardData)) : ?>
                                        <p>No board member found. Click the Add New button now!</p>
                                        <?php else:?>
                                         <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Name</td>
                                                        <td>Contact</td>
                                                        <td>Email</td>
                                                        <td class="text-right">Options</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $Counter = 1; ?>
                                                  <?php foreach($BoardData as $Result): ?>
                                                    <tr>
                                                        <?php 
                                                             EditBoard($Result, $ImagesDir); 
                                                             ViewBoardMember($Result, $ImagesDir); 
                                                             DeleteBoardMember($Result);
                                                         ?>
                                                        <td><?php echo $Counter; $Counter++; ?></td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->BoardMemberName;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->BoardMemberContact;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->BoardMemberEmail;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            
                                                            <span class="badge badge-info fa fa-eye" data-bs-toggle="modal" data-bs-target="#staticBackdropView<?=$Result->AboutID;?>" style="cursor:pointer;"></span>

                                                            <?php if($Privilege->PermitEdit($AboutUs)): ?>
                                                            <label class="label label-success" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?=$Result->AboutID;?>" style="cursor:pointer;">
                                                                Edit
                                                            </label>
                                                            <?php endif;?>

                                                             <?php if($Privilege->PermitDelete($AboutUs)): ?>
                                                            <label class="label label-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropDel<?=$Result->AboutID;?>" style="cursor:pointer;">
                                                                Del
                                                            </label>
                                                            <?php endif;?>
                                                            
                                                        </td>
                                                    </tr>
                                                  <?php endforeach;?>
                                                </tbody>
                                            </table>
                                         <?php endif;?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif;?>

                    <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">

                        <?php if(Session::get('Interact')=='AboutUs'):?>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                     <h5><?=$Heading;?></h5> | 
                                     <img src="<?=$ImagesDir;?>/SystemImages/avatar.png" alt="logo" style="width:30px" class="img-radius" alt="user image">
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics">

                                        <div class="form-group form-default">
                                            <textarea name="Mission" class="form-control" placeholder="Mission Statement"><?=@$AboutData->Mission;?></textarea>
                                        </div>

                                        <div class="form-group form-default">
                                            <textarea name="Vision" class="form-control" placeholder="Vision Statement"><?=@$AboutData->Vision;?></textarea>
                                        </div>

                                        <div class="form-group form-default">
                                            <textarea name="CoreValues" class="form-control" placeholder="Core Values"><?=@$AboutData->CoreValues;?></textarea>
                                        </div>

                                        <div class="form-group form-default">
                                            <textarea name="Achievements" class="form-control" placeholder="Achievement"><?=@$AboutData->Achievements;?></textarea>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                     <h5>Contact Information</h5> 
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics">
                                        <div class="form-group form-default">
                                            <input type="email" name="Email1" class="form-control" placeholder="First Email"  value="<?=@$AboutData->Email1; ?>" >
                                        </div>
                                        <div class="form-group form-default">
                                           <input type="email"  name="Email2" class="form-control" placeholder="Second Email" value="<?=@$AboutData->Email2; ?>" >
                                        </div>
                                        <div class="form-group form-default">
                                        <input type="number" name="Contact1" class="form-control" placeholder="First Active Contact" value="<?=@$AboutData->Contact1; ?>" >
                                        </div>
                                        <div class="form-group form-default">
                                        <input type="number" name="Contact2" class="form-control" placeholder="Second Active Contact" value="<?=@$AboutData->Contact2; ?>" >
                                        </div>

                                         <div class="form-group form-default">
                                            <input type="text" name="FacebookHandle" class="form-control" placeholder="Facebook Handle" value="<?=@$AboutData->FacebookHandle; ?>" >
                                         </div>

                                         <div class="form-group form-default">
                                            <input type="text" name="TwitterHandle" class="form-control" placeholder="Twitter Handle"  value="<?=@$AboutData->TwitterHandle; ?>" >
                                         </div>

                                         <div class="form-group form-default">
                                            <input type="text" name="InstagramHandle" class="form-control" placeholder="Instagram Handle"  value="<?=@$AboutData->InstagramHandle; ?>" >
                                         </div>

                                         <div class="form-group form-default">
                                            <input type="text" name="LinkedinHandle" class="form-control" placeholder="Linkedin Handle"  value="<?=@$AboutData->LinkedinHandle; ?>" >
                                         </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-4">

                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                         <h5>Attached Public Document</h5> 
                                    </div>
                                    <div class="card-block">
                                        <div id="sales-analytics">
                                             <label class="float-label">Public Document</label>
                                             <div class="form-group form-default">
                                                <input type="file" name="AttachedDocument" class="form-control">
                                             </div>
                                            
                                            <?php if(!empty(@$AboutData->AttachedDocument)): ?>
                                                 <div class="form-group form-default">
                                                    <a href="<?=$ImagesDir.'/WebImages/'.@$AboutData->AttachedDocument;?>" download>
                                                        <span class="badge badge-info"> Download Public Document </span>
                                                    </a>
                                                 </div>
                                            <?php endif;?>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                         <h5>Bank Account Information</h5> 
                                    </div>
                                    <div class="card-block">
                                        <div id="sales-analytics">

                                             <div class="form-group form-default">
                                                <input type="text" name="BankName" class="form-control" placeholder="Bank Name" value="<?=@$AboutData->BankName; ?>">
                                             </div>

                                             <div class="form-group form-default">
                                                <input type="text" name="BankBranch" class="form-control" placeholder="Bank Branch" value="<?=@$AboutData->BankBranch; ?>">
                                             </div>

                                             <div class="form-group form-default">
                                                <input type="text" name="BankAccountName" class="form-control" placeholder="Bank Account Name" value="<?=@$AboutData->BankAccountName; ?>">
                                             </div>

                                             <div class="form-group form-default">
                                                <input type="text" name="BankAccountNumber" class="form-control" placeholder="Bank Account Number" value="<?=@$AboutData->BankAccountNumber; ?>">
                                             </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                        <div class="col-xl-4 col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                     <h5>MOMO Account Information</h5> 
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics">

                                         <div class="form-group form-default">
                                            <input type="text" name="MTNHolderName" class="form-control" placeholder="MTN Holder Name" value="<?=@$AboutData->MTNHolderName; ?>">
                                         </div>
                                         <div class="form-group form-default">
                                            <input type="number" name="MTNNumber" class="form-control" placeholder="MTN MOMO Number" value="<?=@$AboutData->MTNNumber; ?>">
                                         </div>

                                         <div class="form-group form-default">
                                            <input type="text" name="VodaHolderName" class="form-control" placeholder="Voda Holder Name" value="<?=@$AboutData->VodaHolderName; ?>">
                                         </div>
                                         <div class="form-group form-default">
                                            <input type="number" name="VodaNumber" class="form-control" placeholder="Voda Cash Number" value="<?=@$AboutData->VodaNumber; ?>">
                                         </div>

                                         <div class="form-group form-default">
                                            <input type="text" name="AirtelTigoHolderName" class="form-control" placeholder="Airtel-Tigo Holder Name" value="<?=@$AboutData->AirtelTigoHolderName; ?>">
                                         </div>
                                         <div class="form-group form-default">
                                            <input type="number" name="AirtelTigoNumber" class="form-control" placeholder="Airtel-Tigo Number" value="<?=@$AboutData->AirtelTigoNumber; ?>">
                                         </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                             <div class="card">
                                <div class="card-header">
                                     <button type="submit" name="SaveAbout" class="btn btn-success" style="float:right !important">Save Information</button>
                                </div>
                            </div>
                        </div>
                        <?php endif;?>
                    </div>
                    </form>


                  
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>

