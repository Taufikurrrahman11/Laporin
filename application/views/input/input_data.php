<section class="content-header">
    <h1>
        Input
        <small>Data</small>
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
        </div>
        <div class="box-body table-responsive">
            <table class="table table-bordered table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Create</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach($row->result() as $key => $data) {?>
                    <tr>
                        <?php if ($key == 0) { ?>
                        <td rowspan="<?= $row->num_rows() ?>" style="vertical-align: middle; text-align: center;">
                            <a href="<?=site_url('input/add')?>" class="btn btn-primary btn-flat">
                                <i class="fa fa-plus"></i> Create
                            </a>
                        </td>
                        <?php } ?>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
