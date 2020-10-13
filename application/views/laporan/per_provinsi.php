 <style type="text/css">
    .dataTables_filter {
        display: none;
    }
    .dataTables_length {
        display: none;
    }
 </style>
        
      
       
        <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">List Provinsi</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">List Provinsi</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                List Provinsi                               
                                <a type="button" class="btn btn-primary" href="<?php echo base_url() ?>Laporan/print"> Cetak</a>
        
                             
                            </div>
                            <div class="card-body">                                
                                <div class="table-responsive">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Provinsi</th>                                                
                                                <th>Jumlah Penduduk</th>                                              
                                            </tr>
                                            <?php $no=0; foreach ($penduduk as $key => $value) { $no++; ?>
                                              <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $value->nama ?></td>
                                                <td><?php echo $value->total_penduduk ?></td>
                                              </tr>
                                          <?php  } ?>
                                        </thead> 
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>
   