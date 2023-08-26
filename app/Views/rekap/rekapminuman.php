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
                                                <div class="stat-text"><span class="count"><?= $minuman; ?></span></div>
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
               <form method="get" action="<?= base_url(); ?>excelminuman/exporthari">
                 <div class="form-group">
                     <label for="tanggal">Rekap Data Per Hari</label>
                     <input name="tanggal" type="date" class="form-control" id="tanggal">
                   </div>
                   <button type="submit" class="btn btn-success fa fa-print">Excel</button>
                    <button type="submit" name="pdf" value="pdf" class="btn btn-danger fa fa-print" href="#">PDF</button>
                     </div>
                </form>
               <div class="col-3 mb-3">
               <form method="get" action="<?= base_url(); ?>excelminuman/exportminggu">
               <div class="form-group">
                       <label for="tanggal_awal">Rekap Data Per Minggu</label>
                       <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                       <label for="tanggal_akhir">Sampai</label>
                       <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                     </div>
                     <button type="submit" class="btn btn-success fa fa-print">Excel</button>
                      <button type="submit" name="pdf" value="pdf" class="btn btn-danger fa fa-print" href="#">PDF</button>
                    </div>
                </form> 
                 <div class="col-3 mb-3">
                   <div class="form-group">
                   <form method="get" action="<?= base_url(); ?>excelminuman/exportbulan">
                   <div class="form-group">
                       <label for="bulan">Rekap Data Per Bulan</label>
                       <input type="month" class="form-control" id="bulan" name="bulan">
                     </div>
                     <button type="submit" class="btn btn-success fa fa-print">
                         Excel</button>
                      <button type="submit" name="pdf" value="pdf" class="btn btn-danger fa fa-print">
                          PDF</button>
                    </div>
                </form>
            </div>
       </div>
    </div>  
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <?= $this->endSection(); ?> 