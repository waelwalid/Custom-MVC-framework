<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?= AdminResourcesDirectory; ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= AdminResourcesDirectory; ?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?= AdminResourcesDirectory; ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?= AdminResourcesDirectory; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- jQuery -->
    <script src="<?= AdminResourcesDirectory; ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= AdminResourcesDirectory; ?>js/bootstrap.min.js"></script>

    <link href="<?= AdminResourcesDirectory; ?>css/dataTables.bootstrap.min.css" rel="stylesheet" />
    
    <script type="text/javascript" src="<?= AdminResourcesDirectory; ?>js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= AdminResourcesDirectory; ?>js/dataTables.min.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<style>
    body{
        background: white;
    }
</style>
</head>

<body >

            <div class="container">

               <div class="row">
               <br /><br /><br /><br /><br />
               
               <div class="col-xs-6 col-xs-offset-3">
                    <h1>AW-stream</h1>
               <br />
                <?php $this->session->getAlert('login'); ?>
                    <form method="post" accept-charset="utf-8" action="<?= base_url.'admin/login' ;?>" >
                    
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" name="u_mail" class="form-control" placeholder="Email">
                            </div>
                             <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="password" name="u_pass" class="form-control" placeholder="Password">
                            </div>
                             <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" value="<?= md5('usbxw[q,/]'); ?>" name="u_remem"> Remember me
                                    </label>
                                </div>
                                
                            </div>
                              <div class="form-group">
                               <button type="submit" class="btn btn-primary">Submit Button</button>
                               <button type="reset" class="btn btn-default">Reset Button</button>
                                
                            </div>
                            

                        </form>
                        </div>
                          
                    </div>
             
  <!-- /.container-fluid -->

        </div>
 

</body>

</html>