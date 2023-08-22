<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<div class="breadcrumbs">
            <di class="breadcrumbs-inner">
                <div class="row">
            
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-1">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            </div>
                                            <div class="stat-text"><span class="count"><?= $registrasi; ?></span></div>
                                            <div class="register-link m-t-15">
                                                <a href="<?= base_url(); ?>rekap/rekapregistrasi">Registrasi Member</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            </div>
                                            <div class="stat-text"><span class="count"><?= $member; ?></span></div>
                                            <div class="register-link m-t-15">
                                                <a href="<?= base_url(); ?>rekap/rekapmember">Kunjungan Member</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-3">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            </div>
                                            <div class="stat-text"><span class="count"><?= $harian; ?></span></div>
                                            <div class="register-link m-t-15">
                                                <a href="<?= base_url(); ?>rekap/kelasharian">Data Kelas Harian</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-5">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            </div>
                                            <div class="stat-text"><span class="count"><?= $minuman; ?></span></div>
                                            <div class="register-link m-t-15">
                                                <a href="<?= base_url(); ?>rekap/rekapminuman">Data Minuman</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>

        <!-- /.content -->
        <div class="clearfix"></div>
        
        <?= $this->endSection(); ?> 