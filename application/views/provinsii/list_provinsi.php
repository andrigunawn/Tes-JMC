 <style type="text/css">
    .dataTables_filter {
        display: none;
    }
    .dataTables_length {
        display: none;
    }
 </style>
        
      
        <div class="modal fade" id="adddata" tabindex="-1" role="dialog" aria-labelledby="adddata" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="<?php echo base_url() ?>provinsii/tambahProvinsi" method="post" >
                                  
                                    <div class="form-row">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Nama Provinsi</label>
                                                <input class="form-control" type="text" name="nama_provinsi" required>
                                            </div>                                            
                                        </div>                                        
                                    </div>                                                                     
                                    <input type="submit" name="Simpan" class="btn btn-primary">
                                </form>
              </div>
            </div>
          </div>
        </div>
 
          <button type="button" class="btn btn-primary btn-sm d-none" id="btneditdata" data-toggle="modal" data-target="#editdata"><i class="mdi mdi-plus-circle ml-1"></i> Edit Data</button>
        
        <div class="modal fade" id="editdata" tabindex="-1" role="dialog" aria-labelledby="editdata" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Ubah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body" id="editform">
              </div>
            </div>
          </div>
        </div>

        <button type="button" class="btn btn-primary btn-sm d-none" id="btndeletedata" data-toggle="modal" data-target="#deletedata"><i class="mdi mdi-plus-circle ml-1"></i> Hapus Data</button>
      
        <div class="modal fade" id="deletedata" tabindex="-1" role="dialog" aria-labelledby="deletedata" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                    <form class="form"  method="post" action="<?php echo site_url('Provinsii/hapusProvinsi') ?>">
                      <input type="hidden" name="id_delete" id="id_delete">
                      <fieldset>
                        <div class="form-group">
                          <label for="">Anda Yakin Menghapus Data ini ?</label>
                        </div>
                        <div class="form-group text-right">
                          <input class="btn btn-default" type="button" value="Batal" data-dismiss="modal">
                            <input class="btn btn-primary" type="submit" value="Hapus">
                        </div>
                      </fieldset>
                    </form>
              </div>
            </div>
          </div>
        </div>
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
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#adddata"><i class="mdi mdi-plus-circle ml-1"></i> Tambah Data</button>
        
                             
                            </div>
                            <div class="card-body">                                
                                <div class="table-responsive">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Provinsi</th>                                                
                                                <th>Aksi</th>                                              
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
            "url": "<?php echo site_url('provinsii/ajax_provinsi'); ?>",
            //"type": "POST",
            "data": function (data) {              
               
                
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
    $('#pencarian').keyup(function(){ //button filter event click
         table.ajax.reload();    //just reload table       
        
    });
    $(document).on('click', '.update', function(){
            var a = $(this).attr("id");
            $.post('<?php echo site_url('Provinsii/editProvinsi') ?>',
            {id :a},function (data) {
              if (data!="" || data != null) {
                $('#editform').html(data);
                $('#btneditdata').click();
              }
            });
       });
    $(document).on("click", ".delete", function(e) {
            var id = $(this).attr("id");
            e.preventDefault();
            $('#btndeletedata').click();
            $('#id_delete').val(id);
        });
});
    
    </script>