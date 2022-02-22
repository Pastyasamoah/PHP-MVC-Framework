
<!-- All Modals First -->
<!-- Add user Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New User</h5>
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
                        <form action="" method="POST" class="form-material">

                            <div class="form-group form-default">
                                <input type="text" name="Name" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">User Name **</label>
                            </div>

                            <div class="form-group form-default">
                                <input type="text" name="Contact" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Contact **</label>
                            </div>

                            <div class="form-group form-default">
                                <input type="email" name="Email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Email **</label>
                            </div>

                            <div class="form-group form-default">
                                <input type="password" name="Password" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Password **</label>
                            </div>

                            <label class="col-form-label">Privilege **</label>
                                <select name="PrivilegeID" class="form-control" required="required">
                                    <option value=""></option>
                                    <?php foreach(@$PrivilegesResult as $P): ?>
                                    <option value="<?=$P->PrivilegeID;?>"> <?=@$P->Name;?> </option>
                                    <?php endforeach;?>
                                </select>
                            <br><br>
                            <div class="col-12">
                                <small>
                                    <?php $Passport = md5(sha1(md5(@$PrivilegesResult[0]->PrivilegeID)));?>
                                    <input type="hidden" name="Passport" value="<?=$Passport;?>">
                                    <input type="hidden" name="ID" value="<?=@$PrivilegesResult[0]->PrivilegeID;?>">
                                   <input type="submit" name="SaveUser" class="btn btn-success btn-lg" value="Add User">
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

<?php function EditUser($Data, $Privilege, $PrivilegesResult){; ?>

<div class="modal fade" id="staticBackdropEdit<?=$Data->UserID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit <?=$Data->Name;?> Records</h5>
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
                        <form action="" method="POST" class="form-material">

                            <div class="form-group form-default">
                                <input type="text" name="Name" class="form-control" value="<?=$Data->Name;?>" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">User Name **</label>
                            </div>

                            <div class="form-group form-default">
                                <input type="text" name="Contact" class="form-control" value="<?=$Data->Contact;?>" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Contact **</label>
                            </div>

                            <div class="form-group form-default">
                                <input type="email" name="Email" class="form-control" value="<?=$Data->Email;?>" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Email **</label>
                            </div>

                            <div class="form-group form-default">
                                <input type="password" name="Password" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Set New Password (<i><small>optional</small></i>)</label>
                            </div>

                            <label class="col-form-label">Privilege **</label>
                                <select name="PrivilegeID" class="form-control" required="required">
                                    <option value="<?=$Data->PrivilegeID;?>"> <?=$Privilege->GetPrivilege($Data->PrivilegeID)->Name;?></option>
                                    <?php foreach($PrivilegesResult as $P): ?>
                                    <option value="<?=$P->PrivilegeID;?>"> <?=$P->Name;?> </option>
                                    <?php endforeach;?>
                                </select>
                            <label class="col-form-label">Status **</label>
                                <select name="Active" class="form-control" required="required">
                                    <option value="<?=$Data->Active;?>"> <?=$Data->Active==1?"Active":"Inactive";?></option>
                                    <?php if($Data->Active == 1): ?>
                                        <option value="0"> Deactivate </option>
                                    <?php else:?>
                                        <option value="1"> Activate </option>
                                    <?php endif;?>
                                </select>
                            <br><br>
                            <div class="col-12">
                                <small>
                                    <?php $Passport = md5(sha1(md5($PrivilegesResult[0]->PrivilegeID)));?>
                                    <?php $_User = md5(sha1(md5($Data->UserID)));?>
                                    <input type="hidden" name="Passport" value="<?=$Passport;?>">
                                    <input type="hidden" name="ID" value="<?=$PrivilegesResult[0]->PrivilegeID;?>">
                                    <input type="hidden" name="User" value="<?=$Data->UserID;?>">
                                    <input type="hidden" name="_User" value="<?=$_User;?>">
                                   <input type="submit" name="EditUser" class="btn btn-success btn-lg" value="Save Changes">
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




<!-- Edit modal -->

<?php function ViewUser($Data, $Privilege, $PrivilegesResult, $ImagesDir, $User){; ?>

<div class="modal fade" id="staticBackdropView<?=$Data->UserID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View <?=$Data->Name;?> Details</h5>
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
                        <?php if($Data->ProfilePicture == ""): ?>
                            <img class="img-fluid img-responsive img-circle card-img-top" 
                                 src="<?=$ImagesDir;?>/SystemImages/avatar.png" 
                                 style="max-width:100px"/>
                        <?php else:?>
                            <img class="img-fluid img-responsive img-thumbnail card-img-top" 
                                 src="<?=$ImagesDir;?>/UsersImages/<?=$Data->ProfilePicture;?>" 
                                 style="max-width:100px"/>
                        <?php endif;?>
                        
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><?=$Data->Name;?></li>
                            <li class="list-group-item"><?=$Data->Contact;?></li>
                            <li class="list-group-item"><?=$Data->Email;?></li>
                        </ul>
                        </center>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9">
                <div class="card">
                    <div class="card-header">
                      <h5><span class="fa fa-user fa-lg"></span></h5>
                    </div>
                    <div class="card-block">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"> 
                                Status
                                <span class="badge badge-info"> 
                                    <?=$Data->Active == 1 ? "Active Account": "Inactive Account";?>
                                </span>
                            </li>
                            <li class="list-group-item">
                                Privilege
                                <span class="badge badge-info"> 
                                    <?=$Privilege->GetPrivilege($Data->PrivilegeID)->Name;?>
                                </span>
                            </li>
                            <li class="list-group-item">
                                Account Created By
                                <span class="badge badge-info"> 
                                    <?=$User->GetById($Data->CreatedBy)->Name;?>
                                </span>
                            </li>

                            <li class="list-group-item">
                                Account Created On
                                <span class="badge badge-info"> 
                                    <?=Date::Format($Data->DateCreated);?>
                                </span>
                            </li>

                            <li class="list-group-item">
                                Account Last Updated By
                                <span class="badge badge-info"> 
                                    <?=$User->GetById($Data->UpdatedBy)->Name;?>
                                </span>
                            </li>

                            <li class="list-group-item">
                                Account Last Updated On
                                <span class="badge badge-info"> 
                                    <?=Date::Format($Data->DateUpdated);?>
                                </span>
                            </li>
                        </ul>  
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


                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                 <h5><?=$Heading;?></h5> 
                                 <?php if($Privilege->PermitCreate($System)): ?> |  
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
                                    <?php if( empty($Data)) : ?>
                                        <p>No user found. Click the Add New button now!</p>
                                    <?php else:?>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Name</td>
                                                        <td>Contact</td>
                                                        <td>Email</td>
                                                        <td>Privilege</td>
                                                        <td>Status</td>
                                                        <td class="text-right">Options</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $Counter = 1; ?>
                                                  <?php foreach($Data as $Result): ?>
                                                    <tr>
                                                        <?php 
                                                             EditUser($Result, $Privilege, $PrivilegesResult); 
                                                             ViewUser($Result, $Privilege, $PrivilegesResult, $ImagesDir, $User); 
                                                         ?>
                                                        <td><?php echo $Counter; $Counter++; ?></td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->Name;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->Contact;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->Email;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0">
                                                                        <?=$Privilege->GetPrivilege($Result->PrivilegeID)->Name;?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                         <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0">
                                                                        <?=$Result->Active==1 ?
                                                                                               "<span class='badge badge-primary'>Active</span>":
                                                                                               "<span class='badge badge-danger'>Inactive</span>" ;?>
                                                                   </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                       
                                                        <td class="text-right">
                                                            <?php if($Privilege->PermitEdit($System)): ?>
                                                            <label class="label label-success" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?=$Result->UserID;?>" style="cursor:pointer;">
                                                                Edit
                                                            </label>
                                                            <?php endif;?>
                                                            <span class="badge badge-info fa fa-eye" data-bs-toggle="modal" data-bs-target="#staticBackdropView<?=$Result->UserID;?>" style="cursor:pointer;"></span>
                                                        </td>
                                                    </tr>
                                                  <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif;?>
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

