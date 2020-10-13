<!DOCTYPE html>

<style type="text/css">
	.invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 0px solid;
}
</style>



<div id="layoutSidenav_content">
        <main>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">             
                        <div class="row">           
                             <div class="invoice-title ">                
                                <h3>Laporan Jumlah Penduduk Per Kabupaten</h3>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <button class="btn btn-primary" id="printpagebutton"  onclick="printpage()">Print</button>
                           
                            
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <td class="text-center"><strong>Nama Provinsi</strong></td>
                                                <td class="text-center"><strong>Nama Kabupaten</strong></td>
                                                <td class="text-center"><strong>Jumlah Penduduk</strong></td>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php 
                                           
                                            foreach ($list->result() as $key => $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?php echo $value->prov; ?></td>                                       
                                                    <td class="text-center"><?php echo $value->nama; ?></td>                                       
                                                    <td class="text-center"><?php echo number_format($value->jumlah_penduduk,0,'','.'); ?></td>
                                                </tr>
                                           <?php 
                                                
                                       } ?>
                                            
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
       
    </div>


</body>
</html>
<script type="text/javascript">        
     function printpage() {       
        var printButton = document.getElementById("printpagebutton");        
        printButton.style.visibility = 'hidden';       
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>
