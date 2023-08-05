<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

        <!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <div class="row">
                </div>
                <!--  /Traffic -->
                <div class="clearfix"></div>
                <!-- Orders -->
                <section class="vh-100" style="background-color: #f4f5f7;">
                    <div class="container py-5 h-100">
                      <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col col-lg-12 mb-4 mb-lg-0">
                          <div class="card mb-3" style="border-radius: .5rem;">
                            <div class="row g-0">
                              <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="images/admin.jpeg"
                                  alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5>RasikhulFikri</h5>
                                <p>Resepsionis</p>
                                <a class="far fa fa-edit mb-5 nav-link" href="updateprofil.html"></a>
                              </div>
                              <div class="col-md-8">
                                <div class="card-body p-4">
                                  <h6>Information</h6>
                                  <hr class="mt-0 mb-4">
                                  <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <h6>Username</h6>
                                        <p class="text-muted">Fikri</p>
                                      </div>
                                    <div class="col-6 mb-3">
                                        <h6>Nama</h6>
                                        <p class="text-muted">Rasikhulfikri</p>
                                      </div>
                                    <div class="col-6 mb-3">
                                      <h6>Email</h6>
                                      <p class="text-muted">info@example.com</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                      <h6>Telepon</h6>
                                      <p class="text-muted">123 456 789</p>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <h6>Alamat</h6>
                                        <p class="text-muted">Bandar Lampung</p>
                                      </div>
                                      <div class="col-6 mb-3">
                                        <h6>Jabatan</h6>
                                        <p class="text-muted">Resepsionis</p>
                                      </div>
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

        <div class="clearfix"></div>
        <!-- Footer -->
        
        <?= $this->endSection(); ?>
