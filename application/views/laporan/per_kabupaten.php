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
                        <h1 class="mt-4">Jumlah Peduduk Per Kabupaten</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Jumlah Peduduk Per Kabupaten</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Jumlah Peduduk Per Kabupaten                               
                                
        
                             
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url() ?>laporan/ajax_print" method="GET">
                                    <div class="form-row">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Filter Provinsi</label>
                                                <select class="form-control" name="provinsi" id="provinsi">
                                                    <option value=""> -- Pilih Provinsi -- </option>
                                                    <?php foreach ($provinsi->result() as $key => $value) { ?>
                                                        <option value="<?php echo $value->id ?>"><?php echo $value->nama; ?></option>
                                                   <?php } ?>
                                                    
                                                </select>
                                            </div> 
                                            <button type="submit" class="btn btn-primary">Print</button>                                           
                                        </div>
                                    </div>                                   
                                </form>
                                <div class="table-responsive">
                                    <table id="table" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Provinsi</th>
                                                <th>Nama Kabupaten</th>
                                                <th>Jumlah Penduduk</th>
                                            </tr>
                                        </thead> 
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>
    <script type="text/javascript">
    var table;
    $(document).ready(function(){
        table = $('#table').DataTable({ 
 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "serverMethod": 'post', //Initial no order.
        "order": [], //Initial no order.
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            /*"url": "<?php //echo site_url('admin/transaksi2/ajax_list?cod=').$cod.'&prov='.$prov.'&kab='.$kab.'&kec='.$kec.'&kel='.$kel; ?>",*/
            "url": "<?php echo site_url('laporan/ajax_kabupaten'); ?>",
            //"type": "POST",
            "data": function (data) {              
                data.provinsi_id = $('#provinsi').val();
               
                
            }
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],
 
    });
     $('#provinsi').change(function(){ //button filter event click
        table.ajax.reload();  //just reload table       
        
    });

     $(document).on('click', '#btn-print', function(){            
            var prov = $('#provinsi').val();
            alert(prov);           
            $.post('<?php echo site_url('laporan/ajax_print') ?>',
            {prov:prov},function (data) {
              if (data!="" || data != null) {
              
              }
            });
       });
   
    
});
    
    </script>