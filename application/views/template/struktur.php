<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Test JMC </title>
       
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/styles.css">
        <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap.min.css">
      <!--   <link rel="stylesheet" href="<?php echo base_url() ?>asset/css/bootstrap-grid.min.css"> -->
        
        
       <script src="<?php echo base_url() ?>asset/js/jquery-3.5.1.min.js" ></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">TEST JMC</a>           
        </nav>
        <div id="layoutSidenav">
           <!-- menu -->
           <?php echo $menu; ?>

           <!-- konten -->
           <?php echo $content; ?>
        </div>
      <!-- js -->
      <?php echo $footer; ?>
    </body>
</html>
