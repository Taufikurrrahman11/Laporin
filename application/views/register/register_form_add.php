<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sales Worker</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <!-- Custom style -->
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/styles.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?=base_url()?>assets/plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
<section class="content-header">
    <h1>
        Users
        <small>Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Register</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Add User</h3>
            <div class="pull-right">
                <a href="<?=site_url('')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i> Back
                </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('register/add')?>" method="post">
                        <div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
                            <label>Name *</label>
                            <input type="text" name="fullname" value="<?=set_value('fullname')?>" class="form-control">
                            <span class="help-block"><?=form_error('fullname')?></span>
                        </div>
                        <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                            <label>Username *</label>
                            <input type="text" name="username" value="<?=set_value('username')?>" class="form-control">
                            <span class="help-block"><?=form_error('username')?></span>
                        </div>
                        <div class="form-group <?=form_error('email') ? 'has-error' : null ?>">
                            <label>Email *</label>
                            <input type="text" name="email" value="<?=set_value('email')?>" class="form-control">
                            <span class="help-block"><?=form_error('email')?></span>
                        </div>
                        <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                            <label>Password *</label>
                            <input type="password" name="password" value="<?=set_value('password')?>" class="form-control">
                            <span class="help-block"><?=form_error('password')?></span>
                        </div>
                        <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                            <label>Konfirmasi Password *</label>
                            <input type="password" name="passconf" value="<?=set_value('passconf')?>" class="form-control">
                            <span class="help-block"><?=form_error('passconf')?></span>
                        </div>
                        <div class="form-group <?=form_error('city_sales') ? 'has-error' : null ?>">
                            <label>City of Sales *</label>
                            <select name="city_sales" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1"<?=set_value('city_sales') == 1 ? "selected" : null?>>- Jogja -</option>
                                <option value="2"<?=set_value('city_sales') == 2 ? "selected" : null?>>- Semarang -</option>
                            </select>
                            <span class="help-block"><?=form_error('level')?></span>
                        </div>
                        <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                            <label>Level *</label>
                            <select name="level" class="form-control">
                                <option value="">- Pilih -</option>
                                <option value="1"<?=set_value('level') == 1 ? "selected" : null?>>- Admin -</option>
                                <option value="2"<?=set_value('level') == 2 ? "selected" : null?>>- Sales -</option>
                                <option value="3"<?=set_value('level') == 3 ? "selected" : null?>>- User -</option>
                            </select>
                            <span class="help-block"><?=form_error('level')?></span>
                        </div>
                        <div class="form-group">
                            <button type="Submit" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
