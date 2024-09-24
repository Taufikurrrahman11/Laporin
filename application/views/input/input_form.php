<section class="content-header">
  <h1>
    Customers
    <small>Pelanggan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">Customer</li>
  </ol>
</section>

<section class="content">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title"><?=ucfirst($page)?> Input</h3>
      <div class="pull-right">
        <a href="<?=site_url('input')?>" class="btn btn-warning btn-flat">
          <i class="fa fa-undo"></i> Back
        </a>
      </div>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
          <form action="<?=site_url('input/process')?>" method="post">
            <div class="form-group hidden field">
              <label>Date *</label>
              <input type="date" name="date" value="<?=date('Y-m-d')?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Customer Name *</label>
              <input type="hidden" name="id" value="<?=$row->customer_id?>">
              <input type="text" name="customer_name" value="<?=$row->name?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Email *</label>
              <input type="email" name="email" value="<?=$row->email?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Phone Number *</label>
              <input type="text" name="phone_nmbr" value="<?=$row->phone_nmbr?>" class="form-control" required>
            </div>
            <div class="form-group">
              <label>Customer Type *</label>
              <select name="customer_type" class="form-control" required>
                <option value=""> pilih </option>
                <option value="Download & Registrasi" <?=$row->customer_type == 'Download & Registrasi' ? 'selected' : '' ?>>Download & Registrasi</option>
                <option value="Subscribe (Berlangganan)" <?=$row->customer_type == 'Subscribe (Berlangganan)' ? 'selected' : '' ?>>Subscribe (Berlangganan)</option>
              </select>
            </div>
            <div class="form-group" id="product_type_group">
              <label>Product Type</label>
              <select name="product_type" class="form-control">
                <option value=""> pilih </option>
                <option value="Platinum Mahasiswa" <?=$row->product_type == 'Platinum Mahasiswa' ? 'selected' : '' ?>>Platinum Mahasiswa</option>
                <option value="SPOTV" <?=$row->product_type == 'SPOTV' ? 'selected' : '' ?>>SPOTV</option>
                <option value="Platinum 30D" <?=$row->product_type == 'Platinum 30D' ? 'selected' : '' ?>>Platinum 30D</option>
                <option value="Premier League Mobile" <?=$row->product_type == 'Premier League Mobile' ? 'selected' : '' ?>>Premier League Mobile</option>
                <option value="Diamond Mobile 30D" <?=$row->product_type == 'Diamond Mobile 30D' ? 'selected' : '' ?>>Diamond Mobile 30D</option>
                <option value="Platinum + SPOTV 30D" <?=$row->product_type == 'Platinum + SPOTV 30D' ? 'selected' : '' ?>>Platinum + SPOTV 30D</option>
                <option value="Diamond All Screen 30D" <?=$row->product_type == 'Diamond All Screen 30D' ? 'selected' : '' ?>>Diamond All Screen 30D</option>
                <option value="Diamond + SPOTV 30D" <?=$row->product_type == 'Diamond + SPOTV 30D' ? 'selected' : '' ?>>Diamond + SPOTV 30D</option>
                <option value="Platinum 1 Tahun" <?=$row->product_type == 'Platinum 1 Tahun' ? 'selected' : '' ?>>Platinum 1 Tahun</option>
                <option value="Diamond Mobile 1 Tahun" <?=$row->product_type == 'Diamond Mobile 1 Tahun' ? 'selected' : '' ?>>Diamond Mobile 1 Tahun</option>
                <option value="Diamond All Screen 1 Tahun" <?=$row->product_type == 'Diamond All Screen 1 Tahun' ? 'selected' : '' ?>>Diamond All Screen 1 Tahun</option>
              </select>
            </div>
            <div class="col-md-12 col-md-offset-0">
          <form action="<?=site_url('dashboard/upload_image')?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Bukti *</label>
              <input type="file" name="bukti" class="form-control" required>
            </div>
            <div class="form-group hidden field">
              <label>Nama Sales *</label>
              <input type="text" name="sales_name" value="<?=ucfirst($this->fungsi->user_login()->username)?>" class="form-control" readonly>
            </div>
            <div class="form-group hidden field">
              <label>City of Sales *</label>
              <input type="text" name="city_sales" value="<?=ucfirst($this->fungsi->user_login()->city_sales)?>" class="form-control" readonly>
            </div>  
            <div class="form-group">
              <button type="submit" name="<?=$page?>" class="btn btn-success btn-flat">
                <i class="fa fa-paper-plane"></i> Save
              </button>
              <button type="reset" class="btn btn-flat">Reset</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var customerTypeField = document.querySelector('select[name="customer_type"]');
    var productTypeGroup = document.getElementById('product_type_group');
    var productTypeField = productTypeGroup.querySelector('select[name="product_type"]');

    function toggleProductType() {
      if (customerTypeField.value === 'Download & Registrasi') {
        productTypeField.value = ''; // Clear the product_type field
        productTypeGroup.style.display = 'none'; // Hide the product_type field
      } else {
        productTypeGroup.style.display = 'block'; // Show the product_type field
      }
    }

    customerTypeField.addEventListener('change', toggleProductType);

    // Initial check
    toggleProductType();
  });
</script>
