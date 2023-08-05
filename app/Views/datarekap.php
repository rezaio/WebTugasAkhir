<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                </div>
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Rekap Data </h4>
                                    </div>
                                </div>
                                </div>
                                <div class="card-body col-lg-8">
                                    <div class="table-stats order-table ov-h">
                                    <table id="<?= base_url(); ?>bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Hari</th>
                                                    <th>Tanggal</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="serial">1.</td>
                                                    <td>  <span class="name">Senin</span> </td>
                                                    <td>  <span class="name">12-06-2023</span> </td>
                                                    <td>
                                                        <span class="badge badge-complete fa fa-print"> Excel</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> 
                                </div>
                            </div> 
                        </div> 
                        <div class="col-xl-4">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card bg-flat-color-3  ">
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
        <!-- /.content -->
        <?= $this->endSection(); ?> 