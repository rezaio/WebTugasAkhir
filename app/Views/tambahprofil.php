<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                </div>
                <div class="clearfix"></div>
                <!-- Orders -->
                <section class="vh-100" style="background-color: #f4f5f7;">
                    <div class="container py-5 h-100">
                      <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-12 mb-4 mb-lg-0">
                          <div class="card mb-3" style="border-radius: .5rem;">
                           
                              <div class="col-md-8">
                                <div class="card-body p-4">
                                  <h6>Tambah User</h6>
                                  <hr class="mt-0 mb-4">
                                  <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                    <form action="<?= base_url(); ?>profil/save" method="POST">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input name="username" type="text" class="form-control" placeholder="Masukkan Username" id="name" required>
                                          </div>
                                      </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input name="email" type="email" class="form-control" placeholder="Masukkan Email" id="name" required>
                                          </div>
                                      </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input name="password" type="text" class="form-control" placeholder="Masukkan Password" id="name" required>
                                          </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Jabatan</label>
                                            <input name="jabatan" type="text" class="form-control" placeholder="Masukkan Jabatan" id="name" required>
                                          </div>
                                      </div>
                                    </div>

                                    <!-- Button trigger modal -->
                                    <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" required>
                                        Tambah </button>
                                  </div>   
                                </form>           
                                <!-- Modal -->
                                <class class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Terima Kasih</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                           Data user berhasil ditambahkan. 
                                        </div>
                                        <div class="modal-footer"> 
                                        <a type="button" class="btn btn-primary" href ="<?= base_url(); ?>tambahprofil"></a>
                                        </div>
                                    </div>
                                    </div>
                                 </class>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
                <!-- /.orders -->
               
        <div class="clearfix"></div>
        <!-- Footer -->
        <?= $this->endSection(); ?>  
