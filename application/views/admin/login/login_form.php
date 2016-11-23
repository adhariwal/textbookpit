<style type="text/css">
    body { background: url(<?php echo base_url();?>admin_assets/img/bg-login.jpg) !important; }
</style>
<body>
<div class="container-fluid-full">
    <div class="row-fluid">
        <div class="row-fluid">
            <div class="login-box">
                <div class="icons">
                    <a href="<?php echo base_url();?>index.php/admin/home"><i class="halflings-icon home"></i></a>
                </div>
                <h2>Login to your account</h2>
                 <div><h2><?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?></h2></div>
                 <?php echo form_open('login',array('class'=>'form-horizontal')) ?>
                    <!--<form class="form-horizontal" action="index" method="post">-->
                        <fieldset>
                            <div class="input-prepend" title="Username">
                                <span class="add-on"><i class="halflings-icon user"></i></span>
                                <input class="input-large span10" name="username" id="username" type="text" placeholder="type username" value="<?php echo set_value('username'); ?>"/>
                            </div>
                            <div class="clearfix"></div>

                            <div class="input-prepend" title="Password">
                                <span class="add-on"><i class="halflings-icon lock"></i></span>
                                <input class="input-large span10" name="password" id="password" type="password" placeholder="type password" value="<?php echo set_value('password'); ?>" />
                            </div>
                            <div class="clearfix"></div>

                            <!--<label class="remember" for="remember"><input type="checkbox" id="remember" />Remember me</label>-->

                            <div class="button-login">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                            <div class="clearfix"></div>
                    </form>
               <!-- <hr>
                <h3>Forgot Password?</h3>
                <p>
                    No problem, <a href="#">click here</a> to get a new password.
                </p>-->
            </div><!--/span-->
        </div><!--/row-->
    </div><!--/.fluid-container-->
</div><!--/fluid-row-->
</body>
</html>
