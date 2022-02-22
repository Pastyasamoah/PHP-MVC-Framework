
<!-- All Modals First -->

<!-- Add Privilege Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add New Privilege</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
             <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>Name</h5>
                    </div>
                    <div class="card-block">
                        <form action="" method="POST" class="form-material">
                            <div class="form-group form-default">
                                <input type="text" name="Name" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Privilege Name **</label>
                            </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>Privileges</h5>
                    </div>
                    <div class="card-block">
                            <div class="form-group row">
                                <?php foreach($PrivilegesMenu as $Priv): ?>

                                    <?php  $PrivilegeName = implode("", explode(" ", $Priv) );?>
                                    <label class="col-form-label"><small class="badge badge-info"><?=$Priv;?></small> **</label>
                                    <div class="col-12">
                                        <small>
                                            <select name="<?=$PrivilegeName;?>" class="form-control" required="required">
                                                <option value=""></option>
                                                <?php foreach($PrivilegesCode as $Key => $Code): ?>
                                                <option value="<?=$Key;?>"> <?=$Code;?> </option>
                                            <?php endforeach;?>
                                            </select>
                                         </small>
                                    </div>
                                <?php endforeach;?>
                                <p>
                                <div class="col-12">
                                    <small>
                                       <input type="submit" name="SavePrivilege" class="btn btn-success btn-lg" value="Add Privilege">
                                     </small>
                                </div>

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
<!-- End privilege modal -->





<!-- Edit modal -->

<?php function EditPrivilege($PrivilegesMenu,$PrivilegesCode,$Data){; ?>

<div class="modal fade" id="staticBackdrop<?=$Data->PrivilegeID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Edit <?=$Data->Name;?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
             <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>Name</h5>
                    </div>
                    <div class="card-block">
                        <form action="" method="POST" class="form-material">
                            <div class="form-group form-default">
                                <input type="text" name="Name" class="form-control" value="<?=$Data->Name;?>" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Privilege Name **</label>
                            </div>
                    </div>
                </div>
            </div>

             <div class="col-lg-6">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>Privileges</h5>
                    </div>
                    <div class="card-block">
                        <div class="form-group row">
                            <?php foreach($PrivilegesMenu as $Priv): ?>
                                <?php  $PrivilegeName = implode("", explode(" ", $Priv) );?>
                                <label class="col-form-label"><small class="badge badge-info"><?=$Priv;?></small> **</label>
                                <div class="col-12">
                                    <small>
                                        <select name="<?=$PrivilegeName;?>" class="form-control" required="required">
                                            <option value="<?=$Data->$PrivilegeName;?>"> <?=$PrivilegesCode[$Data->$PrivilegeName];?> </option>
                                            <?php foreach($PrivilegesCode as $Key => $Code): ?>
                                                <option value="<?=$Key;?>"> <?=$Code;?> </option>
                                            <?php endforeach;?>
                                        </select>
                                     </small>
                                </div>
                            <?php endforeach;?>
                            <p>

                            <div class="col-12">
                                <small>
                                    <?php $Passport = md5(sha1(md5($Data->PrivilegeID)));?>
                                    <input type="hidden" name="Passport" value="<?=$Passport;?>">
                                    <input type="hidden" name="ID" value="<?=$Data->PrivilegeID;?>">
                                   <input type="submit" name="EditPrivilege" class="btn btn-success btn-lg" value="Save Changes">
                                 </small>
                            </div>

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

<?php function DeletePrivilege($Data){; ?>

<div class="modal fade" id="staticBackdropDel<?=$Data->PrivilegeID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete <?=$Data->Name;?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
             <div class="col-12">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>You really want to delete <span class="badge badge-danger"><?=$Data->Name;?> ??</span></h5>
                    </div>
                    <div class="card-block">
                        <form action="" method="POST" class="form-material">
                            <center>
                            <?php $Passport = md5(sha1(md5($Data->PrivilegeID)));?>
                            <input type="hidden" name="Passport" value="<?=$Passport;?>">
                            <input type="hidden" name="ID" value="<?=$Data->PrivilegeID;?>">
                            <input type="submit" name="DeletePrivilege" class="btn btn-danger btn-sm text-center mr-5" value="Yes, Delete">
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
                                 <?php if(@$Privilege->PermitCreate($System)): ?>
                                    | <span class="badge badge-info" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="cursor:pointer;">
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
                                        <p>No privileges found. Click the Add New button now!</p>
                                    <?php else:?>
                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Office</td>
                                                        <?php foreach($PrivilegesMenu as $PrivMenu): ?>
                                                        <td><?=$PrivMenu;?></td>
                                                        <?php endforeach;?>
                                                        <?php if($Privilege->PermitEdit($System)||$Privilege->PermitDelete($System)): ?>
                                                        <td class="text-right">Options</td>
                                                        <?php endif;?>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $Counter = 1; ?>
                                                  <?php foreach($Data as $Priv): ?>
                                                    <tr>
                                                        <?php EditPrivilege($PrivilegesMenu,$PrivilegesCode,$Priv); DeletePrivilege($Priv) ?>
                                                        <td><?php echo $Counter; $Counter++; ?></td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Priv->Name;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                       
                                                        <?php foreach($PrivilegesMenu as $PrivMenu): ?>
                                                        <?php $PrivMenu = implode("", explode(" ", $PrivMenu) );?>
                                                         <td>
                                                            <span class="badge badge-<?php if($Priv->$PrivMenu=="Block"){echo "danger";}else{echo 'info';} ?>">
                                                                <?=$Priv->$PrivMenu;?>
                                                            </span>
                                                        </td>
                                                        <?php endforeach;?>
                                                           
                                                        <td class="text-right">
                                                            <?php if($Privilege->PermitEdit($System)): ?>
                                                            <label class="label label-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$Priv->PrivilegeID;?>" style="cursor:pointer;">
                                                                Edit
                                                            </label>
                                                            <?php endif;?>
                                                            
                                                            <?php if($Privilege->PermitDelete($System)): ?>
                                                            <span class="badge badge-danger fa fa-trash" data-bs-toggle="modal" data-bs-target="#staticBackdropDel<?=$Priv->PrivilegeID;?>" style="cursor:pointer;"></span>
                                                            <?php endif;?>
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

