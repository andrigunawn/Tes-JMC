 <?php 
    
    $debit =0;
    $kredit =0;
    $saldo =0;
    $totalsaldo=0;
    $totaldebit=0;
    $totalkredit=0;
    foreach ($list->result() as $key => $value) {
       
           $debit = ($value->jenis == 1)?$value->nominal:0;
           $kredit = ($value->jenis == 2)?$value->nominal:0;
           $totaldebit = $totaldebit +$debit;
           $totalkredit = $totalkredit +$kredit;
           $saldo = ($debit-$kredit);
           $totalsaldo = $totalsaldo + $saldo;
        
       
    } ?>
                                      
 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                           
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Dashboard
                            </div>
                            <div class="card-body">
                                 <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Saldo</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="medium text-white stretched-link" href="#">Rp <?php echo $totalsaldo; ?></a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Total Pemasukan</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="medium text-white stretched-link" href="#">Rp <?php echo $totaldebit; ?></a>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Pengeluaran</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="medium text-white stretched-link" href="#">Rp <?php echo $totalkredit; ?></a>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>