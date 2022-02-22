
<!-- All Modals First -->
<!-- Add user Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add News</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
             <div class="col-12">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>News Details</h5>
                    </div>
                    <div class="card-block">
                        <form action="" method="POST" enctype="multipart/form-data"  class="form-material">

                            <div class="form-group form-default">
                                <input type="text" name="Title" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Title **</label>
                            </div>

                            <div class="form-group form-default">
                                <textarea name="Description" class="form-control" placeholder="Description" required></textarea>
                            </div>

                            <div class="form-group form-default">
                             <label class="float-label">Attachement</label>
                                 <div class="form-group form-default">
                                    <input type="file" name="Attachment" class="form-control">
                                 </div>
                            </div>

                            <div class="form-group form-default">
                                <input type="text" name="Source" class="form-control" value="<?=$AppName;?>" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Source **</label>
                            </div>

                            <br><br>
                            <div class="col-12">
                                <small>
                                   <input type="submit" name="SaveNews" class="btn btn-success btn-lg" value="Add News">
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

<?php function EditNews($Data, $ImagesDir){; ?>

<div class="modal fade" id="staticBackdropEdit<?=$Data->NewsID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Update News</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
             <div class="col-12">
                <div class="card border-0">
                    <div class="card-header">
                        <h5><?=$Data->Title;?></h5>
                    </div>
                    <div class="card-block">

                        <form action="" method="POST" enctype="multipart/form-data" class="form-material">

                            <div class="form-group form-default">
                                 <center>
                                    <?php if(!empty($Data->Attachment)): ?>
                                        <img class="img-fluid img-responsive img-thumbnail card-img-top" 
                                             src="<?=$ImagesDir;?>/WebImages/<?=$Data->Attachment;?>" 
                                             style="max-width:130px"/>
                                    <?php endif;?>
                                </center>
                            </div>

                            <div class="form-group form-default">
                                <label class="float-label">Title **</label>
                                <input type="text" name="Title" class="form-control" value="<?=$Data->Title;?>" required>
                                <span class="form-bar"></span>
                            </div>
                            <label class="float-label">Description **</label>
                            <div class="form-group form-default">
                                <textarea name="Description" class="form-control" placeholder="Description" required><?=$Data->Description;?></textarea>
                            </div>

                            <div class="form-group form-default">
                             <label class="float-label">Attachment</label>
                                 <div class="form-group form-default">
                                    <input type="file" name="Attachment" class="form-control">
                                 </div>
                            </div>

                            <div class="form-group form-default">
                                 <label class="float-label">Source **</label>
                                <input type="text" name="Source" class="form-control" value="<?=$Data->Source;?>" required>
                                <span class="form-bar"></span>
                            </div>

                            <div class="form-group form-default">
                                <label class="float-label">Status **</label>
                                <select name="Status" class="form-control">
                                    <option value="<?=$Data->Status?>"> <?=$Data->Status==0 ? 'Pending':'Published'; ?> </option>
                                    <?php if($Data->Status==0): ?>
                                        <option value="1">Publish</option>
                                    <?php else:?>
                                        <option value="0">Unpublish</option>
                                    <?php endif;?>
                                </select>
                            </div>

                            <br><br>
                            <div class="col-12">
                                <small>
                                    <?php $Passport = md5(sha1(md5($Data->NewsID)));?>
                                    <input type="hidden" name="Passport" value="<?=$Passport;?>">
                                    <input type="hidden" name="ID" value="<?=$Data->NewsID;?>">
                                   <input type="submit" name="EditNews" class="btn btn-success btn-lg" value="Save Changes">
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

<?php function DeleteNews($Data){; ?>

<div class="modal fade" id="staticBackdropDel<?=$Data->NewsID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Delete <?=$Data->Title;?></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <div class="row">
             <div class="col-12">
                <div class="card border-0">
                    <div class="card-header">
                        <h5>You really want to delete <span class="badge badge-info"><?=$Data->Title;?> ??</span></h5>
                    </div>
                    <div class="card-block">
                        <form action="" method="POST" class="form-material">
                            <center>
                            <?php $Passport = md5(sha1(md5($Data->NewsID)));?>
                            <input type="hidden" name="Passport" value="<?=$Passport;?>">
                            <input type="hidden" name="ID" value="<?=$Data->NewsID;?>">
                            <input type="submit" name="DeleteNews" class="btn btn-danger btn-sm text-center mr-5" value="Yes, Delete">
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

<?php function ViewNews($Data, $ImagesDir, $Comments){; ?>

<div class="modal fade" id="staticBackdropView<?=$Data->NewsID;?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">View News Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
             
              <div class="col-lg-5 col-md-5">
                <div class="card">
                    <div class="card-header">
                      <h5><span> <?=$Data->Title;?></span></h5>
                    </div>
                    <div class="card-block">
                        <?=$Data->Description;?>
                    </div>
                </div>

                <?php if(!empty($Data->Attachment)): ?>
                 <div class="card">
                    <div class="card-block">
                       <img src="<?=$ImagesDir.'/WebImages/'.$Data->Attachment;?>" style="max-width:200px">
                    </div>
                 </div>
                <?php endif;?>
            </div>

            <div class="col-lg-7 col-md-7">
                <div class="card">
                    <div class="card-header">
                      <h5><span class="fa fa-comments fa-lg"></span></h5>
                    </div>
                    <div class="card-block">
                    <?php  $AllComments = $Comments->GetByID($Data->NewsID);?>
                        <?php if( empty($AllComments)): ?>
                            <p>
                                No comments made!
                            </p>  
                        <?php else:?>
                            <?php foreach($AllComments as $Key => $CommentValue): ?>
                                <p>
                                    <span><?=$CommentValue->Comment;?></span><br><br>
                                    <small>
                                    <span class="fa fa-user"> </span>
                                    <span> <tt><?=$CommentValue->Name;?></tt> </span>
                                    <span class="fa fa-envelope"> </span>
                                    <span> <tt> <?=$CommentValue->Email;?></tt></span>
                                    <small><br>
                                </p><hr>
                            <?php endforeach;?>
                    <?php endif;?>
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
                                     <h5>News & Articles</h5> 
                                     <?php if($Privilege->PermitCreate($_News)): ?> |  
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

                                        <?php if( empty(@$Data)) : ?>
                                        <p>No news or article found. Click the Add New button now!</p>
                                        <?php else:?>
                                         <table class="table table-hover">
                                                <thead>
                                                    <tr>
                                                        <td>#</td>
                                                        <td>Title</td>
                                                        <td>Source</td>
                                                        <td>Views</td>
                                                        <td>Likes</td>
                                                        <td>Status</td>
                                                        <td class="text-right">Options</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                  <?php $Counter = 1; ?>
                                                  <?php foreach($Data as $Result): ?>
                                                    <tr>
                                                        <?php 
                                                            EditNews($Result, $ImagesDir); 
                                                            ViewNews($Result, $ImagesDir, $Comments); 
                                                            DeleteNews($Result);
                                                         ?>
                                                        <td><?php echo $Counter; $Counter++; ?></td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->Title;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->Source;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0"><?=$Result->Views;?></p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0">0</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="d-inline-block align-middle">
                                                                <div class="d-inline-block">
                                                                    <p class="text-muted m-b-0" title="Pending articles are not visible on your website">
                                                                        <?=$Result->Status==1? 'Published':'Pending';?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="text-right">
                                                            
                                                            <span class="badge badge-info fa fa-eye" data-bs-toggle="modal" data-bs-target="#staticBackdropView<?=$Result->NewsID;?>" style="cursor:pointer;"></span>

                                                            <?php if($Privilege->PermitEdit($_News)): ?>
                                                            <label class="label label-success" data-bs-toggle="modal" data-bs-target="#staticBackdropEdit<?=$Result->NewsID;?>" style="cursor:pointer;">
                                                                Edit
                                                            </label>
                                                            <?php endif;?>

                                                             <?php if($Privilege->PermitDelete($_News)): ?>
                                                            <label class="label label-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropDel<?=$Result->NewsID;?>" style="cursor:pointer;">
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
                  
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
</div>

