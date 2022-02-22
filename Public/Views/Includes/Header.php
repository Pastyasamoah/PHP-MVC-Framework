<div class="theme-loader">
    <div class="loader-track">
        <div class="preloader-wrapper">
            <div class="spinner-layer spinner-blue">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
            <div class="spinner-layer spinner-red">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
          
            <div class="spinner-layer spinner-yellow">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
          
            <div class="spinner-layer spinner-green">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  -->

<!-- Pre-loader end -->
<div id="pcoded" class="pcoded">
  <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">
    <nav class="navbar header-navbar pcoded-header">
        <div class="navbar-wrapper">
            <div class="navbar-logo">
                <a class="mobile-menu waves-effect waves-light" id="mobile-collapse" href="#!">
                    <i class="ti-menu"></i>
                </a>
                <div class="mobile-search waves-effect waves-light">
                    <div class="header-search">
                        <div class="main-search morphsearch-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                <input type="text" class="form-control" placeholder="Enter Keyword">
                                <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="<?=$BaseURL;?>">
                    <img class="img-fluid" src="<?=$ImagesDir;?>/SystemImages/logo.png" alt="logo" style="width:60px"/>
                </a>
                <a class="mobile-options waves-effect waves-light">
                    <i class="ti-more"></i>
                </a>
            </div>
          
            <div class="navbar-container container-fluid">
                <ul class="nav-left">
                    <li>
                        <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                    </li>
                    <li class="header-search">
                        <div class="main-search morphsearch-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ti-close"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ti-search"></i></span>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="#!" onclick="javascript:toggleFullScreen()" class="waves-effect waves-light">
                            <i class="ti-fullscreen"></i>
                        </a>
                    </li>
                </ul>
                <ul class="nav-right">
                    <li class="header-notification">
                        <a href="#!" class="waves-effect waves-light">
                            <i class="ti-bell"></i>
                            <span class="badge bg-c-red"></span>
                        </a>
                        <ul class="show-notification">
                            <li>
                                <h6>Notifications</h6>
                                <label class="label label-danger">New</label>
                            </li>
                            <li class="waves-effect waves-light">
                                <div class="media">
                                    <img class="d-flex align-self-center img-radius" src="<?=$ImagesDir;?>/SystemImages/avatar.png" alt="sender image" style="width:50px">
                                    <div class="media-body">
                                        <h5 class="notification-user">Pasty Asamoah</h5>
                                        <p class="notification-msg">Kindly prepare and send the form</p>
                                        <span class="notification-time">30 minutes ago</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="user-profile header-notification">
                        <a href="#!" class="waves-effect waves-light">
                            <?php if( !empty($Auth->ProfilePicture) ): ?>
                                <img src="<?=$ImagesDir;?>/UsersImages/<?=$Auth->ProfilePicture;?>" alt="logo" style="width:40px; height:40px" class="img-radius img-responsive" alt="user image">
                            <?php else:?>
                                <img src="<?=$ImagesDir;?>/SystemImages/avatar.png" alt="logo" style="width:30px" class="img-radius" alt="user image">
                            <?php endif;?>
                            <span><?=@$Auth->Name;?></span>
                            <i class="ti-angle-down"></i>
                        </a>
                        <ul class="show-notification profile-notification">
                            <li class="waves-effect waves-light">
                                <a href="<?=$BaseURL;?>/auth/dashboard/profile">
                                    <i class="ti-user"></i> Profile
                                </a>
                            </li>
                            <li class="waves-effect waves-light">
                                <a href="#">
                                    <i class="ti-email"></i> My Messages
                                </a>
                            </li>
                            <li class="waves-effect waves-light">
                                <a href="<?=$BaseURL;?>/logout">
                                    <i class="ti-layout-sidebar-left"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<div class="pcoded-main-container">
<div class="pcoded-wrapper">
  <nav class="pcoded-navbar">
      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
      <div class="pcoded-inner-navbar main-menu">
          <div class="">
              <div class="main-menu-header"><br>
                 <?php if( !empty($Auth->ProfilePicture) ): ?>
                    <img class="img-80 img-responsive img-radius" src="<?=$ImagesDir;?>/UsersImages/<?=$Auth->ProfilePicture;?>" alt="logo" style="width:70px; height:70px" alt="user image">
                <?php else:?>
                     <img class="img-80 img-radius" src="<?=$ImagesDir;?>/SystemImages/avatar.png" alt="logo" style="width:40px" alt="user image">
                <?php endif;?>
                  <div class="user-details">
                      <span id="more-details"><?=@$Auth->Name;?><i class="fa fa-caret-down"></i></span>
                  </div>
              </div>

              <div class="main-menu-content">
                  <ul>
                      <li class="more-details">
                          <a href="<?=$BaseURL;?>/auth/dashboard/profile"><i class="ti-user"></i>View Profile</a>
                          <a href="<?=$BaseURL;?>/logout"><i class="ti-layout-sidebar-left"></i>Logout</a>
                      </li>
                  </ul>
              </div>
          </div>
          <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Menu Items</div>
          <ul class="pcoded-item pcoded-left-item">
              <li class="active">
                  <a href="<?=$BaseURL;?>" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                      <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>

              <?php if(@$Privilege->PermitView($Mentors)): ?>
              <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                      <span class="pcoded-mtext" data-i18n="nav.basic-components.main">Mentors</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
                  <ul class="pcoded-submenu">
                      <li class=" ">
                          <a href="accordion.html" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Option 1</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                      <li class=" ">
                          <a href="breadcrumb.html" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Option 2</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif;?>

              <?php if(@$Privilege->PermitView($Mentees)): ?>
              <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Mentees</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
                  <ul class="pcoded-submenu">
                      <li class=" ">
                          <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Option 1</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif;?>


              <?php if(@$Privilege->PermitView($Members)): ?>
               <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Members</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
                  <ul class="pcoded-submenu">
                      <li class=" ">
                          <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Option 1</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif;?>


              <?php if(@$Privilege->PermitView($Visitors)): ?>
               <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Visitors</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
                  <ul class="pcoded-submenu">
                      <li class=" ">
                          <a href="auth-normal-sign-in.html" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Option 1</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                  </ul>
              </li>
              <?php endif;?>

          </ul>

          <ul class="pcoded-item pcoded-left-item">
            <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                      <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Web</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
                  <ul class="pcoded-submenu">
                     <?php foreach($WebMenu as $MenuLink => $Menu): ?>
                        <?php $PrivMenu = implode("", explode(" ", $Menu) );?>
                        <?php if(@$Privilege->PermitView($PrivMenu)): ?>
                           <li>
                              <a href="<?=$BaseURL.'/'.$MenuLink;?>" class="waves-effect waves-dark">
                                  <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                  <span class="pcoded-mtext" data-i18n="nav.basic-components.alert"><?=$PrivMenu;?></span>
                                  <span class="pcoded-mcaret"></span>
                              </a>
                          </li>
                        <?php endif;?>
                    <?php endforeach;?>
                  </ul>
              </li>

            <?php if(@$Privilege->PermitView($System)): ?>
            <ul class="pcoded-item pcoded-left-item"></ul>
               <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)" class="waves-effect waves-dark">
                      <span class="pcoded-micon"><i class="ti-layout-grid2-alt"></i></span>
                      <span class="pcoded-mtext" data-i18n="nav.basic-components.main">System</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
                  <ul class="pcoded-submenu">
                      <li class=" ">
                          <a href="<?=$BaseURL;?>/auth/system/privileges" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                              <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Privileges</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                      <li class=" ">
                          <a href="<?=$BaseURL;?>/auth/system/users" class="waves-effect waves-dark">
                              <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                              <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Users</span>
                              <span class="pcoded-mcaret"></span>
                          </a>
                      </li>
                  </ul>
              </li>
            </ul>
          <?php endif;?>

      </div>
  </nav>
  <div class="pcoded-content">

  <!-- Page-header start -->
  <div class="page-header">
      <div class="page-block">
          <div class="row align-items-center">
              <div class="col-md-8">
                  <div class="page-header-title">
                      <h5 class="m-b-10"><?=$Heading;?></h5>
                  </div>
              </div>
              <!-- <div class="col-md-4">
                  <ul class="breadcrumb-title">
                      <li class="breadcrumb-item">
                          <a href="index.html"> <i class="fa fa-home"></i> </a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                      </li>
                  </ul>
              </div> -->
          </div>
      </div>
  </div>