
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Update Product</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="">
                                <i class="fa fa-dashboard"></i> Products
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Update Product
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
                
                <div class="col-lg-12">
                    
                        <form enctype="multipart/form-data" role="form" method="post" accept-charset="utf-8" action="<?= base_url.'admin/edit_product' ;?>">
                    <div class="col-lg-9">
                    
                    <div class="form-group">
                                <label>Product title *</label>
                                <input value="<?= $data['product'][0]['product_title']; ?>" name="product_title" class="form-control">
                            </div>
                            
                    <div class="form-group">
                                <label>Product Desc *</label>
                                <textarea cols="20" rows="11" name="product_desc" class="form-control"><?= $data['product'][0]['product_desc']; ?></textarea> 
                            </div>
                    </div>
                    
                    
                    
                    
                    
                    <div class="col-lg-3">
                    
                    
                    <div class="form-group">
                                <label>Product Category *</label>
                                <select name="product_category" class="form-control">
                                
                                    <?php $cats = $data['cats'];
                                    
                                        foreach ($cats as $value){ 
                                            if($value['cat_token'] == $data['product'][0]['product_category']){    
                                    ?>
                                    
                                    <option selected="selected" value="<?= $value['cat_token']; ?>"><?= $value['cat_name']; ?></option>
                                    <?php }else{ ?>
                                    <option  value ="<?= $value['cat_token']; ?>"><?= $value['cat_name']; ?></option>
                                        
                                  <?php   } } ?>
                                    
                                </select>
                            </div>
                            
                    <div class="form-group">
                    <label>Product Image *</label>
                    <div class="upload_view">
                        <img id="blah"  src="<?= ($data['product'][0]['product_img']) ? site_url.'uploads/'.$data['product'][0]['product_img'] : 'http://placehold.it/250x250"'; ?>" class="img-thumbnail">
                    </div> <br />
                    <input type='file' id="imgInp" name="product_img" /><br />
                    
                    </div>  
                    
                    <div class="form-group">
                                <label>Product status: *</label>
                                <br />
                                <div class="radio">
                                    <label>
                                        <input type="radio" <?= ($data['product'][0]['product_status'] == 1) ? 'checked' : '' ; ?>  name="product_status" id="optionsRadios1" value="1"  /><span> <strong> Enabled </strong> </span> 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" <?= ($data['product'][0]['product_img'] == 2) ? '' : '' ; ?> name="product_status" id="optionsRadios2" value="2" /><span> <strong> Disabled </strong> </span> 
                                    </label>
                                </div>
                                
                            </div>
                    <input type="hidden" name="product_token" value="<?= $data['product'][0]['product_token'];?>" />
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
