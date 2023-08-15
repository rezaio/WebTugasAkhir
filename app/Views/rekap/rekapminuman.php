<?= $this->extend('layouts/index'); ?>

<?= $this->section('content'); ?>
        <!-- /#header -->
        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib flat-color-5">
                                        <i class="pe-7s-users"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="text-left dib">
                                                <div class="stat-text"><span class="count">150</span></div>
                                                <div class="stat-heading">Data Minuman</div>
                                             </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div> 
                 </div> 
        </div>
        <div class="card-body p-3">
            <div class="row">
               <div class="col-3 mb-3">
                 <div class="form-group">
                     <label for="name">Rekap Data Per Hari</label>
                     <input type="date" class="form-control" id="name">
                   </div>
                   <a type="button" class="btn btn-success fa fa-print" href="#">
                       Excel</a>
                    <a type="button" class="btn btn-danger fa fa-print" href="#">
                        PDF</a>
               </div>
               <div class="col-3 mb-3">
                   <div class="form-group">
                       <label for="name">Rekap Data Per Minggu</label>
                       <input type="date" class="form-control" id="name">
                       <label for="name">Sampai</label>
                       <input type="date" class="form-control" id="name">
                     </div>
                     <a type="week" class="btn btn-success fa fa-print" href="#">
                         Excel</a>
                      <a type="button" class="btn btn-danger fa fa-print" href="#">
                          PDF</a>
                 </div>
                 <div class="col-3 mb-3">
                   <div class="form-group">
                       <label for="name">Rekap Data Per Bulan</label>
                       <input type="month" class="form-control" id="name">
                     </div>
                     <a type="button" class="btn btn-success fa fa-print" href="#">
                         Excel</a>
                      <a type="button" class="btn btn-danger fa fa-print" href="#">
                          PDF</a>
                    </div>
            </div>
       </div>
    </div>  
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?= $this->endSection(); ?> 