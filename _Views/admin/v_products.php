
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Products</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View Products
                            </li>
                        </ol>
                    </div>
                   
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <!--<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        </div>!-->
                        <?php $this->session->getAlert('res'); ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    
                    <div class="col-lg-12">
                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Create Date</th>
                <th>Status</th>
                <th>Aciions</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                 <th>ID</th>
                <th>Title</th>
                <th>Create Date</th>
                <th>Status</th>
                <th>Aciions</th>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach($data['products'] as $value){ ?>
            <tr>
                <td><?= $value['product_token'] ; ?></td>
                <td><?= $value['product_title'] ; ?></td>
                <td><?= $value['product_create_date'] ; ?></td>
                <td><?= ($value['product_status']?' Published <span class="glyphicon glyphicon-ok"></span>':'Un Published <span class="glyphicon glyphicon-remove"></span>') ; ?></td>
                <td>
                <a class="btn btn-warning" href="<?= base_url.'admin/edit_product/'.$value['product_token']; ?>">Edit</a>
                <a class="btn btn-danger"  href="<?= base_url.'admin/delete_product/'.$value['product_token']; ?>">Delete</a>
                </td>
            </tr>
         <?php } ?>   
        </tbody>
    </table>
                    </div>
                     
                    
                    
                    
                   <script>
                   jQuery(document).ready(function() {
    jQuery('#example').DataTable();
} );
                   </script>
