

<section id="login" class="visible">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-box-plain">
                    <h2 class="bigintro">Login</h2>
                    <center>
                    <img class="img-responsive" src="<?php echo base_url()?>images/fotojyp.png" alt="Constructora JYP">
                    </center>
                    <div class="divide-40">
                        
                    </div>
                    <form id="da-login-form" role="form" method="post" action="<?php echo base_url() ?>index.php/sesion/" autocomplete="off">
                        <div id="da-login-input-wrapper">
                            <div class="form-group">
                                <?php echo validation_errors(); ?>
                                <?php echo form_open('sesion'); ?>
                                <label for="exampleInputEmail1">Usuario</label>
                                <i class="fa fa-user"></i>
                                <input type="text" name="username" class="form-control" id="exampleInput" >
                            </div>
                            <div class="form-group"> 
                                <label for="exampleInputPassword1">Password</label>
                                <i class="fa fa-lock"></i>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="form-actions">

                                <button type="submit" value="Login" class="btn btn-danger">Submit</button>
                            </div>


                    </form>


                </div>
            </div>
        </div>
    </div>
</section>
<!--/LOGIN -->
<!-- REGISTER -->
