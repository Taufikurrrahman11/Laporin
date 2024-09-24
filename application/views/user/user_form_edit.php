<section class="content-header">
      <h1>
        Users
        <small>Pengguna</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit User</h3>
                <div class="pull-right">
                <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Back
                </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="" method="post">
                            <div class="form-group <?=form_error('fullname') ? 'has-error' : null ?>">
                                <label>Name *</label>
                                <input type="hidden" name="user_id" value="<?=$row->user_id?>">
                                <input type="text" name="fullname" value="<?=$this->input->post('fullname') ? $this->input->post('fullname') : $row->name?>" class="form-control">
                                <span class="help-block"><?=form_error('fullname')?></span>
                            </div>
                            <div class="form-group <?=form_error('username') ? 'has-error' : null ?>">
                                <label>Username *</label>
                                <input type="text" name="username" value="<?=$this->input->post('username') ? $this->input->post('username') : $row->username?>" class="form-control">
                                <span class="help-block"><?=form_error('username')?></span>
                            </div>
                            <div class="form-group <?=form_error('email') ? 'has-error' : null ?>">
                                <label>Email *</label>
                                <input type="text" name="email" value="<?=$this->input->post('email') ? $this->input->post('email') : $row->email?>" class="form-control">
                                <span class="help-block"><?=form_error('email')?></span>
                            </div>
                            <div class="form-group <?=form_error('password') ? 'has-error' : null ?>">
                                <label>Password *</label><small>(Biarkan kosong jika tidak diganti)</small>
                                <input type="password" name="password" value="<?=$this->input->post('password')?>" class="form-control">
                                <span class="help-block"><?=form_error('password')?></span>
                            </div>
                            <div class="form-group <?=form_error('passconf') ? 'has-error' : null ?>">
                                <label>Konfirmasi Password *</label>
                                <input type="password" name="passconf" value="<?=$this->input->post('passconf')?>" class="form-control">
                                <span class="help-block"><?=form_error('passconf')?></span>
                            </div>
                            <div class="form-group <?=form_error('city_sales') ? 'has-error' : null ?>">
                                <label>City of Sales *</label>
                                <select name="city_sales" class="form-control">
                                    <?php $city_sales = $this->input->post('city_sales') ? $this->input->post('city_sales') : $row->city_sales?>
                                    <option value=""> pilih </option>
                                    <option value="Malang"> Malang </option>
                                    <option value="Purwokerto"> Purwokerto </option>
                                </select>
                                <span class="help-block"><?=form_error('city_sales')?></span>
                            </div>
                            <div class="form-group <?=form_error('level') ? 'has-error' : null ?>">
                                <label>Level *</label>
                                <select name="level" class="form-control">
                                    <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level?>
                                    <option value="1"> Admin </option>
                                    <option value="2"> Sales </option>
                                    <option value="3"> User </option>
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
    </section>