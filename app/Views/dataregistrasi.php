
<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Registrasi Member</h1>
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
                            <div class="card-body">
                            <div class="card-body d-flex-end">
                                    <h4 class="box-title"> Daftar Tabel </h4>
                                    <!-- Button trigger modal -->
                                <a type="button" class="btn btn-primary fa fa-plus" href="<?= base_url(); ?>registrasi/add">
                                Member </a>
                                <!-- <a type="button" class="btn btn-success fa fa-print" href="<?= base_url(); ?>registrasi/export">
                                   Excel</a>
                                   <a type="button" class="btn btn-danger fa fa-print" href="<?= base_url(); ?>pdfcontroller/rekapRegistrasi">PDF</a> -->
                                </div>
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Tempat Lahir</th>
                                                    <th>Tanggal Lahir</th>
                                                    <th>Usia</th>
                                                    <th>Nomor KTP</th>
                                                    <th>NomorTelpon</th>
                                                    <th>Tipe Member</th>
                                                    <th>Nomor Member</th>
                                                    <th>Tanggal Aktivasi</th>
                                                    <th>Tanggal Berakhir</th>
                                                    <th>Pelatih</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($registrasi as $regist) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><span class="name"> <?= $regist['nama']; ?></span> </td>
                                                    <td> <span class="product"><?= $regist['alamat']; ?></span> </td>
                                                    <td><span class="name"><?= $regist['tempat_lahir']; ?></span></td>
                                                    <td><span class="name"><?= $regist['tanggal_lahir']; ?></span></td>
                                                    <td><span class="name"><?= $regist['usia']; ?></span></td>
                                                    <td><span class="name"> <?= $regist['no_ktp']; ?></span></td>
                                                    <td><span class="name"><?= $regist['no_telp']; ?></span></td>
                                                    <td><span class="name"><?= $regist['tipe_member']; ?></span></td>
                                                    <td><span class="name"><?= $regist['no_member']; ?></span></td>
                                                    <td><span class="name"><?= $regist['tgl_aktivasi']; ?></span></td>
                                                    <td><span class="name"><?= $regist['tgl_berakhir']; ?></span></td>
                                                    <td><span class="name"><?= $regist['pelatih']; ?></span></td>
                                                    <td><span class="name"><?= $regist['harga']; ?></span></td>

                                                    <td class="d-inline-flex">
                                                        <a type="button" class="btn btn-warning" href="<?= base_url(); ?>registrasi/edit/<?= $regist['id_registrasi']; ?>">Edit </a>
                                                       <!-- Button trigger modal -->
                                                        <button type="button" class="mx-1 btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?= $regist['id_registrasi']; ?>">
                                                            Hapus
                                                        </button>
                                                        <a type="submit" class="btn btn-success" href="<?= base_url(); ?>QrPdfController/index">cetak </a>
                                                        
                                                        
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalCenter<?= $regist['id_registrasi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <span class="modal-title" id="exampleModalCenterTitle">Hapus Item</span>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>

                                                                <form action="<?= base_url(); ?>registrasi/delete" method="POST">
                                                                <input type="number" name="id_registrasi" value="<?= $regist['id_registrasi']; ?>" hidden>
                                                                <div class="modal-body">
                                                                Apakah Anda Akan Menghapus Data Ini ?
                                                                </div>
                                                                <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                                
                                                                </div>
                                                                </form>
                                                            </div>
                                                            </div>
                                                        </div>     
                                                    </td>
                                                </tr>   
                                               
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div>
                </div>
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
        <!-- /.content -->
        <?= $this->endSection(); ?>  