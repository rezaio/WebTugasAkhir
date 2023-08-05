<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>

<!-- Content -->
        <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
                <!-- Widgets  -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-2">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text">?</span></div>
                                            <div class="stat-heading">Data Minuman</div>
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
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count"></span></div>
                                            <div class="stat-heading">Member Harian</div>
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
                                    <div class="stat-icon dib flat-color-4">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-text"><span class="count">10</span></div>
                                            <div class="stat-heading">Member Bulanan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body"><div class="chartjs-size-monitor" 
                                style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" 
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div 
                                style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" 
                                style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div 
                                style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                <h4 class="mb-3">Grafik </h4>
                                <canvas id="barChart" width="668" height="333" style="display: block; height: 267px; width: 535px;" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                        <div class="col-xl-4">
                                <div class="col-lg-6 col-xl-12">
                                    <div class="card bg-flat-color-3  ">

                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
        </div>
        
        <div class="clearfix"></div>

        <?= $this->endSection(); ?>  