<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h4 class="box-title">Form Registrasi Member </h4>
                                    
                                    <!-- Button trigger modal -->
                                </div>
                                <div class="card-body">
                                <form action="<?= base_url(); ?>registrasi/save" method="POST">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nama</label>
                                                    <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Alamat</label>
                                                    <input name="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tempat Lahir</label>
                                                    <input name="tempat_lahir" type="text" class="form-control" placeholder="Masukkan tempat Lahir" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Lahir</label>
                                                    <input name="tanggal_lahir" type="date" class="form-control" placeholder="Masukkan tanggal lahir" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Usia</label>
                                                    <input name="usia" type="text" class="form-control" placeholder="Masukkan Usia" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nomor KTP</label>
                                                    <input name="no_ktp" type="number" class="form-control" placeholder="Masukkan Nomor KTP" id="name">
                                                  </div>
                                            </div>
                                            
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nomor HP</label>
                                                    <input name="no_telp" type="number" class="form-control" placeholder="Masukkan No. HP" id="name">
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tipe Member</label>
                                                    <div class="form-group">
                                                        <select name="tipe_member" class="form-control" id="basicSelect" required>
                                                            <option selected disabled>-- Pilih Kategori --</option>
                                                            <option value="1bulan">1 Bulan</option>
                                                            <option value="3bulan">3 Bulan</option> 
                                                            <option value="6bulan">6 Bulan</option> 
                                                            <option value="grub">Grup 1 Bulan 5 Orang</option> 
                                                            <option value="pelatih">Personal Trainer 1 Bulan</option> 
                                                        </select>   
        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Nomor Member</label>
                                                    <input name="no_member" type="number" class="form-control" placeholder="Masukkan Nomor Member" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Aktivasi</label>
                                                    <input name="tgl_aktivasi" type="date" class="form-control" placeholder="Masukkan Tanggal Aktivasi" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Tanggal Berakhir</label>
                                                    <input name="tgl_berakhir" type="date" class="form-control" placeholder="Masukkan Tanggal Aktivasi" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Pelatih</label>
                                                    <input name="pelatih" type="text" class="form-control" placeholder="Masukkan Nama Pelatih" id="name">
                                                  </div>
                                            </div>
                                           
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Harga</label>
                                                    <div class="form-group">
                                                        <select name="harga" class="form-control" id="basicSelect" required>
                                                            <option selected disabled>-- Pilih Kategori --</option>
                                                            <option>250.000</option>
                                                            <option>600.000</option> 
                                                            <option>1.200.000</option> 
                                                            <option>1.000.000</option> 
                                                        </select>   
        
                                                    </div>
                                                </div>
                                            </div>
                                        </div class="col-md-2">
                                    <input class=" col-lg-2 top-left btn btn-primary" type="submit" value="Tambah">
                                </div>
                                </form>
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>

                <!-- /.orders -->
        <!-- /.content -->
        <?= $this->endSection(); ?>  