 <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Update kabupaten</h1>
                        <ol class="breadcrumb mb-4">
                            
                            <li class="breadcrumb-item active">Update kabupaten</li>
                        </ol>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Update kabupaten
                            </div>
                            <div class="card-body">
                                <form action="<?php echo base_url() ?>kabupaten/simpanUpdate" method="post" >
                                    <div class="form-row ">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Provinsi</label>
                                                <select class="form-control" name="provinsi" required>
                                                    <option >--Pilih Provinsi--</option>
                                                    <?php foreach ($provinsi->result() as $key => $value) { ?>
                                                    <option value="<?php echo $value->id ?>" <?php echo ($kabupaten->provinsi_id == $value->id)?'selected':''; ?>><?php echo $value->nama; ?></option>
                                                     <?php } ?>
                                                    
                                                </select>
                                            </div>                                            
                                        </div>                                        
                                    </div>
                                    <div class="form-row ">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Nama kabupaten</label>
                                                <input class="form-control" type="hidden" name="id" value="<?php echo $kabupaten->id; ?>" required>
                                                <input class="form-control" type="text" name="nama" value="<?php echo $kabupaten->nama; ?>">
                                            </div>                                            
                                        </div>                                        
                                    </div>
                                     <div class="form-row ">
                                        <div>
                                            <div class="form-group">
                                                <label class="medium mb-1">Jumlah Penduduk</label>
                                                <input class="form-control" type="number" name="jumlah" value="<?php echo $kabupaten->jumlah_penduduk; ?>" required>
                                                
                                            </div>                                            
                                        </div>                                        
                                    </div>
                                    
                                    
                                    <input type="submit" value="Update" class="btn btn-primary">
                                </form>
                            </div>
                        </div>
                    </div>
                </main>
               
            </div>