<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

        <!-- /#header -->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Kunjungan Member</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-body d-flex-end">
                                <h4 class="box-title"> Daftar Tabel </h4>
                                <!-- Button trigger modal -->
                          
                            <!-- <a type="button" class="btn btn-success fa fa-print" href="///">
                               Excel</a>
                               <a type="button" class="btn btn-danger fa fa-print" href="#">PDF</a> -->
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Nomor Member</th>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($member as $members) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $members['nama']; ?></td>
                                            <td><?= $members['no_member']; ?></td>
                                            <td><?= $members['tanggal']; ?></td>
                                            <td><?= $members['waktu']; ?></td>
                                            <td>

                                              <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?= $members['id_km']; ?>">
                                              Hapus
                                            </button>
                                            
                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModalCenter<?= $members['id_km']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <span class="modal-title" id="exampleModalCenterTitle">Hapus Item</span>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form action="<?= base_url(); ?>member/delete" method="POST">
                                                    <input type="number" name="id_km" value="<?= $members['id_km']; ?>" hidden>
                                                    <div class="modal-body">
                                                    Apakah Anda Akan Menghapus Data Ini ?
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn btn-danger">Hapus</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <?= $this->endSection(); ?> 