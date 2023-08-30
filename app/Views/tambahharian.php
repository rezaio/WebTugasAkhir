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
                                    <h4 class="box-title">Formulir Kelas Harian </h4>
                                    
                                    <!-- Button trigger modal -->
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url(); ?>harian/save" method="POST">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama</label>
                                                    <input name="nama" type="text" class="form-control" placeholder="Masukkan Nama" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nomor Telepon</label>
                                                    <input name="no_telp" type="text" class="form-control" placeholder="Masukkan Nomor Telepon" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Tanggal</label>
                                                    <input name="tanggal" type="date" class="form-control" id="name" required>
                                                  </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Waktu</label>
                                                    <input name="waktu" type="time" class="form-control" placeholder="Masukkan Waktu" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                                                  </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Kelas</label>
                                                    <div class="form-group">
        
                                                        <select name="kelas" class="form-control" id="basicSelect" required>
                                                            <option selected disabled>-- Pilih Kategori --</option>
                                                            <option>GYM</option>
                                                            <option>Zumba</option> 
                                                            <option>Aerobic</option> 
                                                            <option>Strong Nation</option> 
                                                            <option>Pound Fit</option> 
                                                            <option>Kick Boxing</option> 
                                                            <option>Yoga</option>  
                                                        </select>   
        
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Harga</label>
                                                    <div class="form-group">
                                                        <select name="harga" class="form-control" id="basicSelect" required>
                                                            <option selected disabled>-- Pilih Kategori --</option>
                                                            <option>25.000</option>
                                                            <option>30.000</option> 
                                                            <option>35.000</option> 
                                                                                                                                    
                                                        </select>   
        
                                                    </div>
                                                </div>
                                            </div>
                                                 
                                        </div class="col-md-2">

                                        <input class="btn btn-primary" type="submit" value="Tambah">
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->
                    </div> <!-- /.col-md-4 -->
                </div>
                
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
        <!-- /.content -->
        <?= $this->endSection(); ?>  