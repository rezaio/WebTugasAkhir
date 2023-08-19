<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
               
                <!-- /Widgets -->
                <!--  Traffic  -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                           
                            <div class="row">
                               
                               
                                </div>
                            </div> <!-- /.row -->
                            <div class="card-body"></div>
                        </div>
                    </div><!-- /# column -->
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-body d-flex justify-content-between">
                                    <h4 class="box-title">Form Edit Member Harian </h4>
                                    
                                    <!-- Button trigger modal -->
  
 
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url(); ?>harian/update" method="POST">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nama</label>
                                                    <input name="nama" value="<?= $harian['nama']; ?>" type="text" class="form-control" placeholder="Masukkan Nama" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Nomor Telepon</label>
                                                    <input name="no_telp" value="<?= $harian['no_telp']; ?>" type="text" class="form-control" placeholder="Masukkan Nomor Telepon" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Tanggal</label>
                                                    <input name="tanggal" value="<?= $harian['tanggal']; ?>" type="date" class="form-control" placeholder="Masukkan tanggal" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Waktu</label>
                                                    <input name="waktu" value="<?= $harian['waktu']; ?>" type="time" class="form-control" placeholder="Masukkan Waktu" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                  </div>
                                            </div>

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Kelas</label>
                                                    <div class="form-group">
                                                    <option selected disabled>-- Pilih Kategori --</option>
                                                        <select name="kelas" value="" class="form-control" id="basicSelect">
                                                            <option <?php if($harian['kelas'] == "gym") { echo 'selected';} ?> value="gym" >GYM</option>
                                                            <option <?php if($harian['kelas'] == "zumba") { echo 'selected';} ?> value="zumba" >Zumba</option> 
                                                            <option <?php if($harian['kelas'] == "aerobic") { echo 'selected';} ?> value="aerobic" >Aerobic</option> 
                                                            <option <?php if($harian['kelas'] == "strong nation") { echo 'selected';} ?> value="strong nation" >Strong Nation</option> 
                                                            <option <?php if($harian['kelas'] == "pound fit") { echo 'selected';} ?> value="pound fit" >Pound Fit</option> 
                                                            <option <?php if($harian['kelas'] == "kick boxing") { echo 'selected';} ?> value="kick boxing" >Kick Boxing</option> 
                                                            <option <?php if($harian['kelas'] == "yoga") { echo 'selected';} ?> value="yoga" >Yoga</option>  
                                                        </select>   
        
                                                    </div>
                                                </div>
                                            </div>

                                        
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="name">Harga</label>
                                                    <div class="form-group">
                                                        <option selected disabled>-- Pilih Kategori --</option>
                                                        <select name="harga" value="<?= $harian['harga']; ?>" class="form-control" id="basicSelect">
                                                            <option>25.000</option>
                                                            <option>30.000</option> 
                                                            <option>35.000</option> 
                                                                                                                                    
                                                        </select>   
        
                                                    </div>
                                                </div>
                                            </div>

                                            
                                                  
                                        </div class="col-md-2">
                                            
                                        <input type="number" value="<?= $harian['id_kh']; ?>" name="id_kh" hidden>
                                        <input class="btn btn-primary" type="submit" value="Submit">
                                        </div>
                                    </form>

                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                        <div class="col-xl-4">
                           

                                <div class="col-lg-6 col-xl-12">
                                    <div class="card bg-flat-color-3  ">

                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.col-md-4 -->
                    </div>
                </div>
                <!-- /.orders -->
                <!-- To Do and Live Chat -->
        <!-- /.content -->
        <?= $this->endSection(); ?>