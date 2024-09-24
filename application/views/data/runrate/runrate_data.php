<section class="content-header">
    <h1>
        Data
        <small>Target</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">runrate</li>
    </ol>
</section>
<section class="content">
    <?php $this->view('messages') ?>
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Data Target</h3>
            <div class="pull-right">
                <a href="<?= site_url('data/add') ?>" class="btn btn-primary btn-flat">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Sales Amount</th>
                        <th>Working Days</th>
                        <th>Daily Register</th>
                        <th>Daily Subscribe</th>
                        <th>Monthly Register</th>
                        <th>Monthly Subscribe</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                <?php $no = 1;
                    foreach($row->result() as $key => $data) {?>
                        <td><?= $no++ ?>.</td>
                        <td><?= $data->sales_amount ?></td>
                        <td><?= $data->working_days ?></td>
                        <td><?= $data->daily_register ?></td>
                        <td><?= 'Rp ' . number_format($data->daily_subscribe, 0, ',', '.') ?></td>
                        <td><?= $data->monthly_register ?></td>
                        <td><?= 'Rp ' . number_format($data->monthly_subscribe, 0, ',', '.') ?></td>
                        <td class="text-center" width="160px">
                            <a href="<?= site_url('runrate/edit/' . $data->target_id) ?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?= site_url('runrate/del/' . $data->target_id) ?>" onclick="return confirm('Anda yakin ingin menghapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>  
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section>

<div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">runrate</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Register</th>
                  <th>Percentage</th>
                  <th>Subscribe</th>
                  <th>Percentage</th>
                </tr>
                <tr>
                  <td>1.</td>
                  <td>Malang</td>
                  <td><?= $data->r_jogja ?></td>Daily
                  <td><?= round($data->p_r_jogja, 4) ?> %</td>
                  <td><?= 'Rp ' . number_format($data->s_jogja, 0, ',', '.') ?></td>
                  <td><?= round($data->p_s_jogja, 4) ?> %</td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>Purwokerto</td>
                  <td><?= $data->r_semarang ?></td>
                  <td><?= round($data->p_r_semarang, 4) ?> %</td>
                  <td><?= 'Rp ' . number_format($data->s_semarang, 0, ',', '.') ?></td>
                  <td><?= round($data->p_s_semarang, 4) ?> %</td>
                </tr>
                <tr>
                  <td></td>
                  <td>Total</td>
                  <td><?= $data->total_r ?></td>
                  <td><?= ROUND($data->total_p_r, 4) ?> %</td>
                  <td><?= 'Rp ' . number_format($data->total_s, 0, ',', '.') ?></td>
                  <td><?= ROUND($data->total_p_s, 4) ?> %</td>
                </tr>
                <tr>
                    <td></td>
                    <td>Progress</td>
                    <td></td>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <div class="progress progress-xs" style="flex: 1;">
                                <div class="progress-bar progress-bar-yellow" style="width: <?= ROUND($data->total_p_r, 4) ?> %;"></div>
                            </div>
                        </div></td>
                    <td></td>
                    <td>
                        <div style="display: flex; align-items: center;">
                            <div class="progress progress-xs" style="flex: 1;">
                                <div class="progress-bar progress-bar-yellow" style="width: <?= ROUND($data->total_p_s, 4) ?> %;"></div>
                            </div>
                        </div>
                    </td>
                </tr>
                
            </tbody></table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">«</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">»</a></li>
              </ul>
            </div>
          </div>

</section>