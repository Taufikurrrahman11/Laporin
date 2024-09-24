<section class="content-header">
  <h1>
    Sales
    <small>semarang</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Sales</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Malang</h3>
      <!-- Date Filter Form -->
      <form action="<?= site_url('semarang/index') ?>" method="GET" class="form-inline">
          <div class="form-group">
              <label for="start_date">Start Date:</label>
              <input type="date" id="start_date" name="start_date" class="form-control datepicker" value="<?= set_value('start_date', $start_date) ?>" />
          </div>
          <div class="form-group">
              <label for="end_date">End Date:</label>
              <input type="date" id="end_date" name="end_date" class="form-control datepicker" value="<?= set_value('end_date', $end_date) ?>" />
          </div>
          <!-- Retain Active Table Filters -->
          <input type="hidden" name="s_date" value="<?= set_value('s_date', $s_date) ?>" />
          <input type="hidden" name="e_date" value="<?= set_value('e_date', $e_date) ?>" />
          <button type="submit" class="btn btn-primary">Filter</button>
      </form>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>
                <a href="<?= site_url('semarang/index?sort_by=semarang_id&order='.($order == 'asc' ? 'desc' : 'asc').'&start_date='.urlencode($start_date).'&end_date='.urlencode($end_date)) ?>">
                    <i class="fa <?= ($sort_by == 'semarang_id' && $order == 'asc') ? 'fa-sort-amount-asc' : 'fa-sort-amount-desc' ?>"></i>
                </a>
              Sales ID 
            </th>
            <th>
                <a href="<?= site_url('semarang/index?sort_by=date&order='.($order == 'asc' ? 'desc' : 'asc').'&start_date='.urlencode($start_date).'&end_date='.urlencode($end_date)) ?>">
                  <i class="fa <?= ($sort_by == 'date' && $order == 'asc') ? 'fa-sort-amount-asc' : 'fa-sort-amount-desc' ?>"></i>
                </a>
              Date 
            </th>
            <th>
                <a href="<?= site_url('semarang/index?sort_by=sales_name&order='.($order == 'asc' ? 'desc' : 'asc').'&start_date='.urlencode($start_date).'&end_date='.urlencode($end_date)) ?>">
                  <i class="fa <?= ($sort_by == 'sales_name' && $order == 'asc') ? 'fa-sort-amount-asc' : 'fa-sort-amount-desc' ?>"></i>
                </a>
              Sales Name 
            </th>
            <th>
                <a href="<?= site_url('semarang/index?sort_by=email&order='.($order == 'asc' ? 'desc' : 'asc').'&start_date='.urlencode($start_date).'&end_date='.urlencode($end_date)) ?>">
                  <i class="fa <?= ($sort_by == 'email' && $order == 'asc') ? 'fa-sort-amount-asc' : 'fa-sort-amount-desc' ?>"></i>
                </a>
              Sales Email 
            </th>
            <th>
                <a href="<?= site_url('semarang/index?sort_by=total_register&order='.($order == 'asc' ? 'desc' : 'asc').'&start_date='.urlencode($start_date).'&end_date='.urlencode($end_date)) ?>">
                  <i class="fa <?= ($sort_by == 'total_register' && $order == 'asc') ? 'fa-sort-amount-asc' : 'fa-sort-amount-desc' ?>"></i>
                </a>
              Total Register 
            </th>
            <th>
                <a href="<?= site_url('semarang/index?sort_by=total_subscribe&order='.($order == 'asc' ? 'desc' : 'asc').'&start_date='.urlencode($start_date).'&end_date='.urlencode($end_date)) ?>">
                  <i class="fa <?= ($sort_by == 'total_subscribe' && $order == 'asc') ? 'fa-sort-amount-asc' : 'fa-sort-amount-desc' ?>"></i>
                </a>
              total Subscribe 
            </th>
            <th>
                <a href="<?= site_url('semarang/index?sort_by=total_subscribe&order='.($order == 'asc' ? 'desc' : 'asc').'&start_date='.urlencode($start_date).'&end_date='.urlencode($end_date)) ?>">
                  <i class="fa <?= ($sort_by == 'total_subscribe' && $order == 'asc') ? 'fa-sort-amount-asc' : 'fa-sort-amount-desc' ?>"></i>
                </a>
              Sales Subscribe 
            </th>
          </tr>
        </thead>
        <tbody>
          <?php if ($row): ?>
            <?php $no = 1; foreach($row->result() as $key => $data): ?>
              <tr>
                <td><?= $no++ ?>.</td>
                <td><?= date('d-m-Y', strtotime($data->date)) ?></td>
                <td><?= $data->sales_name ?></td>
                <td><?= $data->email ?></td>
                <td><?= $data->total_register ?></td>
                <td><?= $data->total_subscribe ?></td>
                <td><?= $data->sales_subscribe ?></td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="7" class="text-center">No data available</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script src="<?=base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<script>
  $(function() {
    // Datepicker Initialization
    $(".datepicker").datepicker({
      dateFormat: 'dd-mm-yy',
      autoclose: true
    });
  });
</script>
<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title">Keterangan Tidak Aktif</h3>
      <form action="<?= site_url('semarang/index') ?>" method="GET" class="form-inline">
          <div class="form-group">
              <label for="s_date">Start Date:</label>
              <input type="date" id="s_date" name="s_date" class="form-control datepickeractive" value="<?= set_value('s_date', $s_date) ?>" />
          </div>
          <div class="form-group">
              <label for="e_date">End Date:</label>
              <input type="date" id="e_date" name="e_date" class="form-control datepickeractive" value="<?= set_value('e_date', $e_date) ?>" />
          </div>
          <!-- Retain semarang Table Filters -->
          <input type="hidden" name="start_date" value="<?= set_value('start_date', $start_date) ?>" />
          <input type="hidden" name="end_date" value="<?= set_value('end_date', $end_date) ?>" />
          <button type="submit" class="btn btn-primary">Filter</button>
      </form>
    </div>
    <div class="box-body table-responsive">
      <table class="table table-bordered table-striped" id="table1">
        <thead>
          <tr>
            <th>Sales Name</th>
            <th>Date</th>
          </tr>
        </thead>
        <tbody>
            <?php if (!empty($sales_name)): ?>
                <?php foreach ($sales_name as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user->sales_name, ENT_QUOTES, 'UTF-8') ?></td>
                        <td><?= htmlspecialchars(date('d-m-Y', strtotime($user->date)), ENT_QUOTES, 'UTF-8') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2" class="text-center">No data available</td>
                </tr>
            <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<script>
  $(function() {
    // Datepicker Initialization
    $(".datepickeractive").datepicker({
      dateFormat: 'dd-mm-yy',
      autoclose: true
    });
  });
</script>