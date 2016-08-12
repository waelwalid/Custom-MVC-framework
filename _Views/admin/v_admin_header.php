<?php 
/*print_r($_SESSION);
return;
exit();*/
if(@$_SESSION['checker'] != @$_SESSION['verify_login'] OR @$_SESSION['logged_in'] != true){
    session_destroy();
    header('Location:'.base_url.'admin/login');
}
?>

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

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url.'admin' ;?>">AW-Stream</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?= $_SESSION['u_data'][0]['u_name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li>
                            <a href="<?= base_url.'admin/logout'; ?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="<?= base_url.'admin' ; ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Products <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="<?= base_url.'admin/show_products' ; ?>"> Show products</a>
                            </li>
                            <li>
                                <a href="<?= base_url.'admin/add_new_product' ; ?>"> Create new product</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-fw fa-arrows-v"></i> Categories <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo2" class="collapse">
                            <li>
                                <a href="<?= base_url.'admin/show_categories' ; ?>"> Show categories</a>
                            </li>
                            <li>
                                <a href="<?= base_url.'admin/add_new_category' ; ?>"> Create new category</a>
                            </li>
                            
                        </ul>
                    </li>
                    
                    <li>
                        <a href="<?= base_url.'home' ; ?>"><i class="fa fa-fw fa-bar-chart-o"></i> View Front-end site</a>
                    </li>
                    
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
