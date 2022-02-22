 <section class="login-block">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="" method="POST" class="md-float-material form-material">
                    <div class="auth-box card">
                        <div class="card-block">
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <h3 class="text-center"><?=$Heading;?></h3>
                                </div>
                            </div>
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
                            <div class="form-group form-primary">
                                <input type="email" name="Email" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Your Email Address</label>
                            </div>
                            <div class="form-group form-primary">
                                <input type="password" name="Password" class="form-control" required>
                                <span class="form-bar"></span>
                                <label class="float-label">Password</label>
                            </div>
                            <div class="row m-t-25 text-left">
                                <div class="col-12">
                                    <div class="checkbox-fade fade-in-primary d-">
                                        <label>
                                            <input type="checkbox" value="">
                                            <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                            <span class="text-inverse">Remember me</span>
                                        </label>
                                    </div>
                                    <div class="forgot-phone text-right f-right">
                                        <a href="#" class="text-right f-w-600"> Forgot Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-md-12">
                                    <button type="submit" name="Login" class="btn btn-primary btn-md btn-block waves-effect waves-light text-center m-b-20">Sign in</button>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-10">
                                    <p class="text-inverse text-left">
                                        <a href="index.html" style="text-decoration:none;">
                                            <b><?=$AppName;?></b>
                                        </a>
                                    </p>
                                </div>
                                <div class="col-md-2">
                                    <img class="img-fluid" src="<?=$ImagesDir;?>/SystemImages/logo.png" alt="logo" style="width:70px"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>