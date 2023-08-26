<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>


            <!-- Animated -->

            <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Kunjungan Kelas Harian</h1>
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
                                <a type="button" class="btn btn-primary fa fa-plus" href="<?= base_url(); ?>harian/add">
                                kunjungan harian </a>
                            
                                </div>
                            
                                        <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nomor Telepon</th>
                                                    <th>tanggal</th>
                                                    <th>Waktu</th>
                                                    <th>Kelas</th>
                                                    <th>Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($harian as $pengunjung) : ?>
                                                
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><span class="name"> <?= $pengunjung['nama']; ?></span> </td>
                                                    <td> <span class="name"><?= $pengunjung['no_telp']; ?></span> </td>
                                                    <td><span class="name"><?= $pengunjung['tanggal']; ?></span></td>
                                                    <td><span class="name"><?= $pengunjung['waktu']; ?></span></td>
                                                    <td><span class="name"><?= $pengunjung['kelas']; ?></span></td>
                                                    <td><span class="name"><?= $pengunjung['harga']; ?></span></td>
                                                    
        

                                                    <td class="d-inline-flex">
                                                        <a type="button" class="btn btn-warning" href="<?= base_url(); ?>harian/edit/<?= $pengunjung['id_kh']; ?>">Edit </a>
                                                        <button type="button" class="mx-1 btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter<?= $pengunjung['id_kh']; ?>">
                                                            Hapus
                                                        </button>
                                                        
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="exampleModalCenter<?= $pengunjung['id_kh']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Hapus Item</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                                </div>
                                                                
                                                                <form action="<?= base_url(); ?>harian/delete" method="POST">
                                                                <input type="number" name="id_kh" value="<?= $pengunjung['id_kh']; ?>" hidden>
                                                                <div class="modal-body">
                                                                Apakah Anda Ingin Menghapus Data Ini ? 
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
              

        <?= $this->endSection(); ?>  