 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tambah kabupaten</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Tambah kabupaten</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Tambah kabupaten
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url() ?>kabupaten/tambahkabupaten" method="post" >
                                    <div class="form-row">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Provinsi</label>
                                                <select class="form-control" name="provinsi" id="provinsi">
                                                    <option> -- Pilih Provinsi -- </option>
                                                    <?php foreach ($provinsi->result() as $key => $value) { ?>
                                                        <option value="<?php echo $value->id ?>"><?php echo $value->nama; ?></option>
                                                   <?php } ?>
                                                    
                                                </select>
                                            </div>                                            
                                        </div>                                        
                                    </div>
                                    <div class="form-row">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Nama kabupaten</label>
                                                <input class="form-control" type="text" name="nama" required>
                                            </div>                                            
                                        </div>                                        
                                    </div>         
                                    <div class="form-row">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Jumlah Penduduk</label>
                                                <input class="form-control" type="number" name="jumlah" required>
                                            </div>                                            
                                        </div>                                        
                                    </div>                                    
                                    <input type="submit" name="submit" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </main>               
            </div>

<!-- <script type="text/javascript">
    $(document).ready(function(){
                    $('#provinsi').change(function(){
                        var id=$(this).val();
                        $.ajax({
                            url : "<?php //echo base_url();?>kabupaten/getProvinsi",
                            method : "POST",
                            data : {id: id},
                            async : false,
                            dataType : 'json',
                            success: function(data){
                                var html = '';
                                var i;
                                for(i=0; i<data.length; i++){
                                    html += '<option value="'+data[i].id+'">'+data[i].nama+'</option>';
                                }
                                $('.kabupaten').html(html);
                                 
                            }
                        });
                    });
                });
</script> -->