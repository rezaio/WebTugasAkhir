<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

        <!-- Content -->

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Data Minuman</h1>
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
                            <div class="card">
                            <div class="card-body d-flex-end">
                                    <h4 class="box-title">Data Minuman </h4>
                                    
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary fa fa-plus" data-toggle="modal" data-target="#exampleModal" href="<?= base_url(); ?>minuman/add">
                                    Minuman </button>
                                    <a type="button" class="btn btn-success fa fa-print" href="<?= base_url(); ?>minuman/export">
                                        Excel</a>
                                        <a type="button" class="btn btn-danger fa fa-print" href="<?= base_url(); ?>pdfcontroller/rekapMinuman">
                                    PDF</a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah Minuman</h5>
                                        <a type="button" class="close" data-dismiss="modal" aria-label="Close" href="<?= base_url(); ?>minuman/add"></a>
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?= base_url(); ?>minuman/save" method="POST">
                                                <div class="form-group">
                                                <label for="name">Nama Minuman</label>
                                                <input name="nama" type="text" class="form-control" id="name" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group">
                                                <label for="name">Harga Minuman</label>
                                                <input name="harga" type="number" class="form-control" id="name">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Jumlah Minuman</label>
                                                    <input name="jumlah" type="number" class="form-control" id="name">
                                                </div>
                                                <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                            </form>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="table">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                            
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Total</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no = 1; ?>
                                            <?php foreach ($minuman as $minumans) : ?>
                                                <tr>
                                                    <td class="serial"><?= $no++; ?></td>
                                                    <td> <?= $minumans['nama']; ?> </td>
                                                    <td>  <span class="name"><?= $minumans['harga']; ?></span> </td>
                                                    <td>  <span class="name"><?= $minumans['jumlah']; ?></span> </td>
                                                    <td>  <span class="name"> <?= $minumans['harga'] * $minumans['jumlah']; ?> </span> </td>
        
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