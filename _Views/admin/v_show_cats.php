
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Categories</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> View categories
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
        <?php foreach($data['categories'] as $value){ ?>
            <tr>
                <td><?= $value['cat_token'] ; ?></td>
                <td><?= $value['cat_name'] ; ?></td>
                <td><?= $value['cat_create_date'] ; ?></td>
                <td><?= ($value['cat_state']?' Active <span class="glyphicon glyphicon-ok"></span>':'Deactive <span class="glyphicon glyphicon-remove"></span>') ; ?></td>
                <td>
                <a class="btn btn-warning" href="<?= base_url.'admin/edit_category/'.$value['cat_token']; ?>">Edit</a>
                <a class="btn btn-danger"  href="<?= base_url.'admin/delete_category/'.$value['cat_token']; ?>">Delete</a>
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
