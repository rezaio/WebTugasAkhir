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
                            <div class="row g-0">
                              <div class="col-md-4 gradient-custom text-center text-white"
                                style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                <img src="<?= base_url(); ?>images/admin.jpeg"
                                  alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                <h5><?= $profil['username']; ?></h5>
                                <p><?= $profil['jabatan']; ?></p>
                            </div>
                              <div class="col-md-8">
                                <div class="card-body p-4">
                                  <h6>Information</h6>
                                  <hr class="mt-0 mb-4">
                                  <div class="row pt-1">
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input name="username" value="<?= $profil['username']; ?>" type="text" class="form-control" placeholder="Masukkan Username" id="name">
                                          </div>
                                      </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Email</label>
                                            <input name="email" value="<?= $profil['email']; ?>" type="email" class="form-control" placeholder="Masukkan Email" id="name">
                                          </div>
                                      </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Password</label>
                                            <input name="password " value="" type="password" class="form-control" placeholder="Masukkan Password" id="password">
                                          </div>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <div class="form-group">
                                            <label for="name">Jabatan</label>
                                            <input name="jabatan" value="<?= $profil['jabatan']; ?>" type="text" class="form-control" placeholder="Masukkan Jabatan" id="name">
                                          </div>
                                      </div>
                                    </div>
                                    <input type="number" value="<?= $profil['id_user']; ?>" name="id_user" hidden>
                                    <input class=" col-lg-2 top-left btn btn-primary" type="submit" value="Submit">
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
        