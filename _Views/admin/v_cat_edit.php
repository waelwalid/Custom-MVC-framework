
<div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Edit category</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Edit  Category
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
                    <?php //print_r($data['category']); return; ?>
                        <form name="csrf_form" role="form" method="post" accept-charset="utf-8" action="<?= base_url.'admin/edit_category' ;?>">

                            <div class="form-group">
                                <label>Category title *</label>
                                <input name="cat_name" value="<?= $data['category'][0]['cat_name']; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Category Parent</label>
                                <select name="cat_parent" class="form-control">
                                    <option value="0">Select Parent</option>
                                    <?php
                                     $cats = $data['cats']; foreach ($cats as $value){ 
                                     if($data['category'][0]['cat_parent'] == $value['cat_token']){ ?>
                                        <option selected="selected" value="<?= $value['cat_token']; ?>"><?= $value['cat_name']; ?></option>
                                    
                                   <?php  }else{ ?>
                                        <option value="<?= $value['cat_token']; ?>"><?= $value['cat_name']; ?></option>
                                    
                                   <?php  }   ?>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                         <input type="hidden" name="csrf_token" value="<?php echo $data['token']; ?>" />
                            <div class="form-group">
                                <label>Category status:</label>
                                <br />
                                <div class="radio">
                                    <label>
                                        <input <?= ($data['category'][0]['cat_state'] == 1) ? 'checked' : '' ; ?> type="radio" name="cat_state" id="optionsRadios1" value="1"  /><span> <strong> Enabled </strong> </span> 
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input <?= ($data['category'][0]['cat_state'] == 2) ? 'checked' : '' ; ?> type="radio" name="cat_state" id="optionsRadios2" value="2" /><span> <strong> Disabled </strong> </span> 
                                    </label>
                                </div>
                                
                            </div>
                            <input type="hidden" name="cat_token" value="<?= $data['category'][0]['cat_token']; ?>" />
                           
                            <button type="reset" class="btn btn-default btn-sm">Reset</button>
                            
                            <button type="submit" class="btn btn-default btn-sm btn-primary">Submit</button>

                        </form>

                    </div>
                     
                    
                    
                    
                   
