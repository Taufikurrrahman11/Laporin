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
            <h3 class="box-title">Data Customer</h3>
            <div class="pull-right">
                <div class="pull-right">
                    <a href="<?= base_url('delete-customers'); ?>" onclick="return confirm('Anda yakin ingin menghapus data?')" class="btn btn-danger" style="margin-right: 10px;">
                    <i class="fa fa-trash"></i> Delete All Data
                    </a>
                </div>
                <div class="pull-right">
                    <a href="<?php echo base_url('Pelanggan/export_to_excel'); ?>" class="btn btn-success" style="margin-right: 10px;">
                        <i class="fa fa-plus"></i> Export to Excel
                    </a>
                </div>
            </div>
            <div class="pull-right">
                <a href="<?=site_url('customer/add')?>" class="btn btn-primary btn-flat" style="margin-right: 10px;">
                    <i class="fa fa-plus"></i> Create
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Customer Type</th>
                        <th>Product Type</th>
                        <th>Bukti</th>
                        <th>Sales</th>
                        <th>City of Sales</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) {?>
                    <tr>
                        <td><?=$no++?>.</td>
                        <td><?=indo_date($data->date)?></td>
                        <td><?=$data->name?></td>
                        <td><?=$data->email?></td>
                        <td><?=$data->phone_nmbr?></td>
                        <td><?=$data->customer_type?></td>
                        <td><?=$data->product_type?></td>
                        <td><?=$data->bukti?></td>
                        <td><?=$data->sales_name?></td>
                        <td><?=$data->city_sales?></td>
                        <td class="text-center" width="160px">
                            <a href="<?=site_url('customer/edit/'.$data->customer_id)?>" class="btn btn-primary btn-xs">
                                <i class="fa fa-pencil"></i> Update
                            </a>
                            <a href="<?=site_url('customer/del/'.$data->customer_id)?>" onclick="return confirm('Anda yakin ingin menghapus data?')" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i> Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                    }?>
                </tbody>
            </table>
        </div>
        
      </div>
    </div>
    </div>
</section>
