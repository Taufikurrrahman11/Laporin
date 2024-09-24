<section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Week 1</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Sales Name</th>
                        <th>Registrasi</th>
                        <th>Subscribe</th>
                        <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->sales_names ?></td>
                            <td><?= $data->r_week1 ?></td>
                            <td><?= $data->s_week1 ?></td>
                            <td><?= 'Rp ' . (is_numeric($data->v_week1) ? number_format($data->v_week1, 0, ',', '.') : '0') ?></td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>

            </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Week 2</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Sales Name</th>
                        <th>Registrasi</th>
                        <th>Subscribe</th>
                        <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->sales_names ?></td>
                            <td><?= $data->r_week2 ?></td>
                            <td><?= $data->s_week2 ?></td>
                            <td><?= 'Rp ' . (is_numeric($data->v_week2) ? number_format($data->v_week2, 0, ',', '.') : '0') ?></td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>

            </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Week 3</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Sales Name</th>
                        <th>Registrasi</th>
                        <th>Subscribe</th>
                        <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->sales_names ?></td>
                            <td><?= $data->r_week3 ?></td>
                            <td><?= $data->s_week3 ?></td>
                            <td><?= 'Rp ' . (is_numeric($data->v_week3) ? number_format($data->v_week3, 0, ',', '.') : '0') ?></td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>

            </div>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Week 4</h3>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped" id="table1">
                    <thead>
                        <tr>
                        <th>No.</th>
                        <th>Sales Name</th>
                        <th>Registrasi</th>
                        <th>Subscribe</th>
                        <th>Volume</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach($row->result() as $key => $data) {?>
                        <tr>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data->sales_names ?></td>
                            <td><?= $data->r_week4 ?></td>
                            <td><?= $data->s_week4 ?></td>
                            <td><?= 'Rp ' . (is_numeric($data->v_week4) ? number_format($data->v_week4, 0, ',', '.') : '0') ?></td>
                        </tr>
                        <?php
                        }?>
                    </tbody>
                </table>

            </div>
    </section>