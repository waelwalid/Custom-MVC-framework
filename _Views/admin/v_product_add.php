
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Add new Product</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="">
                                <i class="fa fa-dashboard"></i> Products
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Add new Product
                            </li>
                        </ol>
                    </div>
                   
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <?php $this->session->getAlert('res'); ?>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
<!-- `product_id``product_title``product_desc``product_category``product_create_date``product_auther``product_status``product_img` -->
                    <div class="col-lg-12">
                    
                        <form enctype="multipart/form-data" name="csrf_form" role="form" method="post" accept-charset="utf-8" action="<?= base_url.'admin/add_new_product' ;?>">
                    <div class="col-lg-9">
                    
                    <div class="form-group">
                                <label>Product title *</label>
                                <input required="on" name="product_title" class="form-control">
                            </div>
                            
                    <div class="form-group">
                                <label>Product Desc *</label>
                                <textarea required="on" cols="20" rows="11" name="product_desc" class="form-control"></textarea> 
                            </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="col-lg-3">
                    
                    
                    <div class="form-group">
                                <label>Product Category *</label>
                                <select  name="product_category" class="form-control">
                                
                                    <?php $cats = $data['cats']; foreach ($cats as $value){ ?>
                                    <option value="<?= $value['cat_token']; ?>"><?= $value['cat_name']; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            
                    <div class="form-group">
                    <label>Product Image *</label>
                    <div class="upload_view">
                        <img id="blah"  src="http://placehold.it/250x250" class="img-thumbnail">
                    </div> <br />
                    <input required="on" type='file' id="imgInp" name="product_img" /><br />
                    
                    </div>  
                    
                    <div class="form-group">
                                <label>Product status: *</label>
                                <br />
                                <div class="radio">
                                    <label>
                                        <input required="on" type="radio" name="product_status" id="optionsRadios1" value="1"  /><span> <strong> Enabled </strong> </span> 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input required="on" type="radio" name="product_status" id="optionsRadios2" value="2" /><span> <strong> Disabled </strong> </span> 
                                    </label>
                                </div>
                                
                            </div>
                            
                     <input type="hidden" name="csrf_token" value="<?php echo $data['token']; ?>" />
                            
 <hr />
                           
                            <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            
                            <button type="submit" class="btn btn-default btn-sm btn-primary">Submit</button>
                           
                    </div>
                            

                            
                        

                        </form>

                    </div>
                     
                    
                    
                    
                   <script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
    </script> 
