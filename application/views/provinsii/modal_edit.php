<form class="cmxform" enctype="multipart/form-data" method="post" action="<?php echo site_url('Provinsii/simpanUpdate') ?>">
  <input type="hidden" name="provinsi_id" value="<?php echo $provinsi->id ?>">
  <fieldset>
    
    <div class="form-group">
        <label class="medium mb-1">Provinsi</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $provinsi->nama ?>">
    </div>     
   
    <div class="form-group text-right">
      <input class="btn btn-default" type="button" value="Batal" data-dismiss="modal">
      <input class="btn btn-primary" type="submit" value="Ubah">
    </div>
  </fieldset>
</form>
