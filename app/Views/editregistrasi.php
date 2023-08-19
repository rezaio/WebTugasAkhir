<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                            </div>
                            </div> 
                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h4 class="box-title">Form Edit Registrasi Member </h4>
                                    
                                    <!-- Button trigger modal -->
                                </div>
                                <div class="card-body">
                                <form action="<?= base_url(); ?>registrasi/update" method="POST">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input type="text" value="<?= $registrasi['nama']; ?>" class="form-control" placeholder="Masukkan Nama" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Alamat</label>
                                                    <input type="text" value="<?= $registrasi['alamat']; ?>" class="form-control" placeholder="Masukkan Alamat" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tempat Lahir</label>
                                                    <input type="text" value="<?= $registrasi['tempat_lahir']; ?>" class="form-control" placeholder="Masukkan tempat Lahir" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Lahir</label>
                                                    <input type="text" value="<?= $registrasi['tanggal_lahir']; ?>" class="form-control" placeholder="Masukkan tanggal lahir" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Usia</label>
                                                    <input type="text" value="<?= $registrasi['usia']; ?>" class="form-control" placeholder="Masukkan Usia" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nomor KTP</label>
                                                    <input type="text" value="<?= $registrasi['no_ktp']; ?>" class="form-control" placeholder="Masukkan Nomor KTP" id="name">
                                                  </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nomor HP</label>
                                                    <input type="text" value="<?= $registrasi['no_telp']; ?>" class="form-control" placeholder="Masukkan No. HP" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tipe Member</label>
                                                    <input type="text" value="<?= $registrasi['tipe_member']; ?>" class="form-control" placeholder="Masukkan Tipe Member" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nomor Member</label>
                                                    <input type="text" value="<?= $registrasi['no_member']; ?>" class="form-control" placeholder="Masukkan Nomor Member" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Aktivasi</label>
                                                    <input type="text" value="<?= $registrasi['tgl_aktivasi']; ?>" class="form-control" placeholder="Masukkan Tanggal Aktivasi" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Berakhir</label>
                                                    <input type="text" value="<?= $registrasi['tgl_berakhir']; ?>" class="form-control" placeholder="Masukkan Tanggal Aktivasi" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Pelatih</label>
                                                    <input type="text" value="<?= $registrasi['pelatih']; ?>" class="form-control" placeholder="Masukkan Nomor Member" id="name">
                                                  </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Harga</label>
                                                    <div class="form-group">
                                                        <option selected disabled>-- Pilih Kategori --</option>
                                                        <select name="harga" value="<?= $registrasi['harga']; ?>" class="form-control" id="basicSelect">
                                                            <option>250.000</option>
                                                            <option>600.000</option> 
                                                            <option>1.200.000</option> 
                                                            <option>1.000.000</option> 
                                                        </select>   
        
                                                    </div>
                                                </div>
                                            </div>
                                             </div 
                                              class="col-md-2">
                                    <input class=" col-lg-2 top-left btn btn-primary" type="submit" value="Submit">
                                </div>
                            </div> 
                        </div> 
                    </div>
                </div>
                <!-- /.orders -->
        <!-- /.content -->
        <?= $this->endSection(); ?>