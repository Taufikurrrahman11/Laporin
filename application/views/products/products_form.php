<section class="content-header">
      <h1>
        Products
        <small>Items</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
        <li class="active">products</li>
      </ol>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?=ucfirst($page)?> products</h3>
                <div class="pull-right">
                <a href="<?=site_url('products')?>" class="btn btn-warning btn-flat">
                    <i class="fa fa-undo"></i>Back
                </a>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <form action="<?=site_url('products/process')?>" method="post">
                        <div class="form-group">
                        <input type="hidden" name="id" value="<?=$row->products_id?>">
                        <label>Product Type *</label>
                        <select name="product_type" class="form-control" required>
                            <option value=""> pilih </option>
                            <option value="Platinum Mahasiswa" <?=$row->product_type == 'Platinum Mahasiswa' ? 'selected' : 'Platinum Mahasiswa' ?>> Platinum Mahasiswa </option>
                            <option value="SPOTV" <?=$row->product_type == 'SPOTV' ? 'selected' : 'SPOTV' ?>> SPOTV </option>
                            <option value="Platinum 30D" <?=$row->product_type == 'Platinum 30D' ? 'selected' : 'Platinum 30D' ?>> Platinum 30D </option>
                            <option value="Premier League Mobile" <?=$row->product_type == 'Premier League Mobile' ? 'selected' : 'Premier League Mobile' ?>> Premier League Mobile </option>
                            <option value="Diamond Mobile 30D" <?=$row->product_type == 'Diamond Mobile 30D' ? 'selected' : 'Diamond Mobile 30D' ?>> Diamond Mobile 30D </option>
                            <option value="Platinum + SPOTV 30D" <?=$row->product_type == 'Platinum + SPOTV 30D' ? 'selected' : 'Platinum + SPOTV 30D' ?>> Platinum + SPOTV 30D </option>
                            <option value="Diamond All Screen 30D" <?=$row->product_type == 'Diamond All Screen 30D' ? 'selected' : 'Diamond All Screen 30D' ?>> Diamond All Screen 30D </option>
                            <option value="Diamond + SPOTV 30D" <?=$row->product_type == 'Diamond + SPOTV 30D' ? 'selected' : 'Diamond + SPOTV 30D' ?>> Diamond + SPOTV 30D </option>
                            <option value="Platinum 1 Tahun" <?=$row->product_type == 'Platinum 1 Tahun' ? 'selected' : 'Platinum 1 Tahun' ?>> Platinum 1 Tahun </option>
                            <option value="Diamond Mobile 1 Tahun" <?=$row->product_type == 'Diamond Mobile 1 Tahun' ? 'selected' : 'Diamond Mobile 1 Tahun' ?>> Diamond Mobile 1 Tahun </option>
                            <option value="Diamond All Screen 1 Tahun" <?=$row->product_type == 'Diamond All Screen 1 Tahun' ? 'selected' : 'Diamond All Screen 1 Tahun' ?>> Diamond All Screen 1 Tahun </option>
                        </select>
                        </div>
                            <div class="form-group">
                                <label>Price *</label>
                                <input type="text" name="price" value="<?=$row->price?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button type="Submit" name="<?=$page?>" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>