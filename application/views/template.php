<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>myPOS - by YukCoding</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="<?=base_url()?>https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini" <?= $this->uri->segment(1) == 'customers' ? 'sidebar-collapse' : null ?>>

<div class="wrapper">

  <header class="main-header">
    <a href="<?=base_url()?>assets/index2.html" class="logo">
      <span class="logo-mini">s<b>R</b></span>
      <span class="logo-lg">sales<b>REPORT</b></span>
    </a>
   
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">3</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 3 tasks</li>
              <li>
                <ul class="menu">
                  <li>
                    <a href="#">
                      <h3>Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?=ucfirst($this->fungsi->user_login()->username)?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <p>
                  <?=ucfirst($this->fungsi->user_login()->username)?>
                  <small><?=$this->fungsi->user_login()->city_sales?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left" class="margin-top">
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
                <div class="pull-right">
                  <a href="<?=site_url('auth/logout')?>" class="btn btn-flat bg-red">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <aside class="main-sidebar">
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php if($this->fungsi->user_login()->level != 2) { ?>
        <li <?=$this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? 'class="active"': '' ?>>
          <a href="<?=site_url('dashboard')?>">
            <i class="fa fa-dashboard"></i> 
            <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <?php } ?>
        <?php if($this->fungsi->user_login()->level != 2) { ?>
          <li class="treeview <?=$this->uri->segment(1) == 'achievement' || $this->uri->segment(1) == 'productivity' || $this->uri->segment(1) == 'runrate' || $this->uri->segment(1) == 'daily_jogja' || $this->uri->segment(1) == 'weekly_semarang'? 'active': '' ?>">
              <a href="<?=site_url('achievement')?>">
                  <i class="fa fa-line-chart"></i> <span>Data</span>
                  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                  <li <?=$this->uri->segment(1) == 'achievement' ? 'class="active"': '' ?>><a href="<?=site_url('achievement')?>"><i class="fa fa-circle-o"></i> Achievement</a></li>
                  <li <?=$this->uri->segment(1) == 'productivity' ? 'class="active"': '' ?>><a href="<?=site_url('productivity')?>"><i class="fa fa-circle-o"></i> Productivity</a></li>
                  <li <?=$this->uri->segment(1) == 'runrate' ? 'class="active"': '' ?>><a href="<?=site_url('runrate')?>"><i class="fa fa-circle-o"></i> Run Rate</a></li>
                  <li <?=$this->uri->segment(1) == 'daily_jogja' ? 'class="active"': '' ?>><a href="<?=site_url('daily_jogja')?>"><i class="fa fa-circle-o"></i> Weekly Malang</a></li>
                  <li <?=$this->uri->segment(1) == 'weekly_semarang' ? 'class="active"': '' ?>><a href="<?=site_url('weekly_semarang')?>"><i class="fa fa-circle-o"></i> Weekly Purwokerto</a></li>
            </ul>
        </li>
        <?php } ?>
        <?php if($this->fungsi->user_login()->level == 2) { ?>
        <li <?=$this->uri->segment(1) == 'input' ? 'class="active"': '' ?>>
          <a href="<?=site_url('input')?>">
            <i class="fa fa-pencil"></i> <span>Input</span>
          </a>
        </li>
        <?php } ?>
        <li class="treeview <?=$this->uri->segment(1) == 'jogja' || $this->uri->segment(1) == 'semarang'? 'active': '' ?>">
              <a href="<?=site_url('jogja')?>">
                  <i class="fa fa-male"></i> <span>Sales</span>
                  <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
              </a>
              <ul class="treeview-menu">
                  <li <?=$this->uri->segment(1) == 'jogja' ? 'class="active"': '' ?>><a href="<?=site_url('jogja')?>"><i class="fa fa-circle-o"></i> Malang</a></li>
                  <li <?=$this->uri->segment(1) == 'semarang' ? 'class="active"': '' ?>><a href="<?=site_url('semarang')?>"><i class="fa fa-circle-o"></i> Purwokerto</a></li>
            </ul>
        </li>
          <?php if($this->fungsi->user_login()->level == 1) { ?>
          <li <?=$this->uri->segment(1) == 'customer' ? 'class="active"': '' ?>>
            <a href="<?=site_url('customer')?>">
              <i class="fa fa-users"></i> <span>Customers</span>
            </a>
          </li>
        <?php } ?>
        <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li <?=$this->uri->segment(1) == 'products' ? 'class="active"': '' ?>>
          <a href="<?=site_url('products')?>">
            <i class="fa fa-gift"></i> <span>Products</span>
          </a>
        </li>
        <?php } ?>
        <?php if($this->fungsi->user_login()->level == 1) { ?>
        <li class="header">SETTINGS</li>
        <li <?=$this->uri->segment(1) == 'user' ? 'class="active"': '' ?>><a href="<?=site_url('user')?>"><i class="fa fa-user"></i> <span>Users</span></a></li>
        <?php } ?>
      </ul>
    </section>
  </aside>

  <div class="content-wrapper">
    <section class="content container-fluid">
      <!-- Main content starts here -->
      <?= $contents ?>
      <!-- Main content ends here -->
    </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2019 <a href="https://yukcoding.id">YukCoding Tutor</a>.</strong> All rights reserved.
  </footer>

</div>
<!-- ./wrapper -->

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script>
<script src="<?=base_url()?>https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="<?=base_url()?>https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="<?=base_url()?>https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


</body>
</html>
