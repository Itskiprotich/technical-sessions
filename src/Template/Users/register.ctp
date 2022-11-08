


<div class="page-content">

<!-- Main content -->
<div class="content-wrapper">

    <!-- Content area -->
    <div class="content d-flex justify-content-center align-items-center">

        <!-- Login form -->
        <!-- <form class="login-form" action="/users/login">  -->
        <?= $this->Form->create() ?>
            <div class="card mb-0">
                <div class="card-body">
                    <div class="text-center mb-3">
                        <i class="icon-reading icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                        <h5 class="mb-0">Signup to your account</h5> 
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="form-control-feedback">
                            <i class="icon-user text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <!-- echo form input with a nice template -->
                        <?= $this->Form->input('role_id', ['class' => 'form-control', 'placeholder' => 'Role', 'label' => false]) ?>
                    
                    <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group form-group-feedback form-group-feedback-left">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="form-control-feedback">
                            <i class="icon-lock2 text-muted"></i>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Sign Up <i class="icon-circle-right2 ml-2"></i></button>
                    </div>

                    <div class="text-center"> 
                    </div>
                </div>
            </div>
        <!-- </form> -->
        <?= $this->Form->end() ?>
        <!-- /login form -->

    </div>
    <!-- /content area -->


</div>
<!-- /main content -->

</div>