<form class="cmxform" enctype="multipart/form-data" method="post" action="<?php echo site_url('kabupaten/simpanUpdate') ?>">
  <input type="hidden" name="id" value="<?php echo $kabupaten->id ?>">
  <fieldset>
    
    <div class="form-group">
        <label class="medium mb-1">Provinsi</label>
        <select class="form-control" name="provinsi" required>
            <option >--Pilih Provinsi--</option>
            <?php foreach ($provinsi->result() as $key => $value) { ?>
            <option value="<?php echo $value->id ?>" <?php echo ($kabupaten->provinsi_id == $value->id)?'selected':''; ?>><?php echo $value->nama; ?></option>
             <?php } ?>
            
        </select>
    </div>     
    <div class="form-group">
      <label for="nama">Nama Kabupaten</label>
      <input class="form-control " name="nama" type="text" value="<?php echo $kabupaten->nama;?>">
    </div> 
     <div class="form-group">
          <label class="medium mb-1">Jumlah Penduduk</label>
          <input class="form-control" type="number" name="jumlah" value="<?php echo $kabupaten->jumlah_penduduk; ?>" required>
          
      </div>                
    <div class="form-group text-right">
      <input class="btn btn-default" type="button" value="Batal" data-dismiss="modal">
        <input class="btn btn-primary" type="submit" value="Ubah">
    </div>
  </fieldset>
</form>
