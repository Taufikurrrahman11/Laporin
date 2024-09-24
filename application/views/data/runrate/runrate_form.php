<section class="content-header">
    <h1>
    data
    <small>Worker</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i></a></li>
    <li class="active">data</li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <h3 class="box-title"><?=ucfirst($page)?> data</h3>
            <div class="pull-right">
            <a href="<?=site_url('runrate')?>" class="btn btn-warning btn-flat">
                <i class="fa fa-undo"></i>Back
            </a>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form action="<?=site_url('runrate/process')?>" method="post">
                        <div class="form-group">
                            <label>Sales Amount *</label>
                            <input type="hidden" name="id" value="<?=$row->sales_amount?>">
                            <input type="text" name="sales_amount" value="<?=$row->sales_amount?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Working Days *</label>
                            <input type="text" name="working_days" value="<?=$row->working_days?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Daily Register *</label>
                            <input type="text" name="daily_register" value="<?=$row->daily_register?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Daily SUbscribe *</label>
                            <input type="text" name="daily_subscribe" value="<?=$row->daily_subscribe?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Monthly Register *</label>
                            <input type="text" name="monthly_register" value="<?=$row->monthly_register?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Monthly SUbscribe *</label>
                            <input type="text" name="monthly_subscribe" value="<?=$row->monthly_subscribe?>" class="form-control" required>
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