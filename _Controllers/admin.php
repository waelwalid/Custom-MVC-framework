<?php 
namespace main\controllers;
/**
     * @Class       action
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com - 2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */

class admin extends \main\w_class\autoloading {
    
    private $data = array();
    private $model ;
    private $url ;
    private $filter;
    private $upload ;
    
    public function __construct(){
        
       
        try{
            $this->url      = $this->loadClass('route');
            $this->model    = $this->loadModel('model');
            $this->filter   = $this->loadClass('filter');
            $this->session  = $this->loadClass('session');
            $this->session->starter();
            $this->upload   = $this->loadClass('upload');
            
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }
    
    public function index(){
        try{
                $products_where = array('product_status' => 1);
                $data['products_count'] = count($this->model->selectFromDb('products','*',$products_where,''));
                $categories_where = array('cat_state' => 1);
                $data['categories_count']     = count($this->model->selectFromDb('categories','*',$categories_where,''));
                $this->loadAdminTemplate('v_admin_home',$data);
        }catch(Exception $e){
            echo $e->getMessage();
        }
       
    }
    public function login(){
        if(@$_SESSION['checker'] == @$_SESSION['verify_login'] AND @$_SESSION['logged_in'] == true){
            $this->url->redirect($this->url->makeLink(array('admin')));    
                exit() ;
            }
        
        if($_POST){
            
             $u_name     =   $this->filter->valid($_POST['u_mail'],true,'email');
             $u_password  =   $this->filter->valid($_POST['u_pass'],true,'str');
             if($u_name AND $u_password){
                $where = array('u_email' => $u_name,'u_password' => md5($u_password));
                $user_data = $this->model->selectFromDb('users','u_name,u_email',$where);
             }
             if(count(@$user_data) === 1){
                    $this->session->setSession('logged_in',true);
                    $this->session->setSession('u_data',@$user_data);
                    $this->session->setSession('verify_login',md5(hash('sha256',@$user_data[0]['u_email'])));
                    $this->session->setSession('checker',md5(hash('sha256',@$_SESSION['u_data'][0]['u_email'])));
                if(@$_POST['u_remem']) {
                     if($this->filter->valid(@$_POST['u_remem'],false,'str') === md5('usbxw[q,/]')){
                       setcookie('logme',md5(hash('sha256',uniqid().@$user_data[0]['u_email'])));
                       setcookie('logmeon',@$user_data[0]['u_email']);
                       $this->model->updateToDb('users',array('remem' => @$_COOKIE['logme']),array('u_email' => @$_COOKIE['logmeon']));
                    }
                }
                $this->url->redirect($this->url->makeLink(array('admin')));    
                exit() ;
                
         
                }else{ /** no user exist */
                $res['error'] = '<div class="alert alert-danger" role="alert">User is not exist !</div>';
                $this->session->setAlert('login',$res);
                
                }
            
            
        }elseif(isset($_COOKIE['logme']) AND isset($_COOKIE['logmeon'])){
             $u_name        =   $this->filter->valid($_COOKIE['logmeon'],true,'str');
             $u_password    =   $this->filter->valid($_COOKIE['logme'],true,'str');
             if($u_name AND $u_password){
                $where = array('u_email' => $u_name,'remem' => $u_password);
                $user_data = $this->model->selectFromDb('users','u_name,u_email',$where);
             }
             if(count(@$user_data) === 1){
                    $this->session->setSession('logged_in',true);
                    $this->session->setSession('u_data',@$user_data);
                    $this->session->setSession('verify_login',md5(hash('sha256',@$user_data[0]['u_email'])));
                    $this->session->setSession('checker',md5(hash('sha256',@$_SESSION['u_data'][0]['u_email'])));
                if(@$_POST['u_remem']) {
                     if($this->filter->valid(@$_POST['u_remem'],false,'str') === md5('usbxw[q,/]')){
                       setcookie('logme',md5(hash('sha256',uniqid().@$user_data[0]['u_email'])));
                       setcookie('logmeon',@$user_data[0]['u_email']);
                       $this->model->updateToDb('users',array('remem' => @$_COOKIE['logme']),array('u_email' => @$_COOKIE['logmeon']));
                    }
                }
                $this->url->redirect($this->url->makeLink(array('admin')));    
                exit() ;
                
         
                }
             
        }
         
             
        
        $this->loadView('admin/v_admin_login');
        
    }
    
    public function logout(){
        session_destroy();
        foreach($_COOKIE as $value){
            unset($value);
        }
        $this->url->redirect($this->url->makeLink(array('admin/login')));    
                exit() ;
    }
    
    /** Products Methods **/ 
    
    public function show_products(){
        $data['products']  = $this->model->selectFromDb('products','*',array(),'');
        $this->loadAdminTemplate('v_products',$data);
    }
    public function add_new_product(){
        
            $data['cats']  = $this->model->selectFromDb('categories','*',array('cat_state' => 1),'');
            $data['token'] = $this->session->generate_csrf() ;
            
            if($_POST){
                /** check if there is no CSRF issue */
                if($this->session->csrf() != true){ 
                    $res['csrf'] = '<div class="alert alert-danger" role="alert"> Request not allowed (Invalid CSRF code)</div>';
                }
                
                 
                    $allowed =  array('gif','png' ,'jpg'); 
                    $upload = $this->upload->uploadFile(@$_FILES['product_img'],'./uploads/',$allowed) ;
                    if(!isset($upload['file_name'])){
                        $res['upload'] = '<div class="alert alert-danger" role="alert"> Error Uploading file </div>'; 
                    }else{
                        $data_insert['product_img']         =  $upload['file_name'];
                    } 
                
            
                /** validate and filter inputs */  
                $data_insert['product_title']       =  $this->filter->valid($_POST['product_title'],true,'str','Product title'); 
                $data_insert['product_desc']        =  $this->filter->valid($_POST['product_desc'],true,'str','Product Description');
                $data_insert['product_category']    =  $this->filter->valid($_POST['product_category'],true,'num','Product category');
                $data_insert['product_status']      =  $this->filter->valid($_POST['product_status'],true,'num','Product status');
                $data_insert['product_token']       =  rand(2,9999*89*50);
                $data_insert['product_img']         =  $upload['file_name'];
            
            /** Insert into database */ 
            if(count($res) == 0 AND $this->model->insertToDB('products',$data_insert) == true){
                $res['success_insert'] = '<div class="alert alert-success" role="alert">Product has been added successfully</div>';
                $this->session->setAlert('res',$res);
                $this->url->redirect($this->url->makeLink(array('admin','add_new_product')));    
                exit() ; 
            }else{
                $res['error_insert'] = '<div class="alert alert-danger" role="alert">Error while adding a new product</div>';
                $this->session->setAlert('res',$res);
                $this->url->redirect($this->url->makeLink(array('admin','add_new_product')));    
                exit() ; 
            }
        }else{
             $this->loadAdminTemplate('v_product_add',$data);
        }
           
        
       
    }
    
    
    public function edit_product(){
        
            $data['cats']  = $this->model->selectFromDb('categories','*',array('cat_state' => 1),'');
            $data['token'] = $this->session->generate_csrf() ;
            
            
            if($_POST){
                /** check if there is no CSRF issue */
                if($this->session->csrf() != true){ 
                    $res['csrf'] = '<div class="alert alert-danger" role="alert"> Request not allowed (Invalid CSRF code)</div>';
                }
                $pro_token = $this->filter->valid($_POST['product_token'],true,'num','Product token');
                $data['product'] = $this->model->selectFromDb('products','*',array('product_token' => $pro_token),1);
                /** check for not empty image */
                if(empty($_FILES['product_img']['error'])){ 
                     /** set allowed upload exttension */
                    $allowed =  array('gif','png' ,'jpg'); 
                    $upload = $this->upload->uploadFile(@$_FILES['product_img'],'./uploads/',$allowed) ;
                    if(!isset($upload['file_name'])){
                        $res['upload'] = '<div class="alert alert-danger" role="alert"> Error Uploading file </div>'; 
                    }else{
                        $data_insert['product_img']         =  $upload['file_name'];
                    } 
                }    
                
                /** validate and filter inputs */  
                $data_insert['product_title']       =  $this->filter->valid($_POST['product_title'],true,'str','Product title'); 
                $data_insert['product_desc']        =  $this->filter->valid($_POST['product_desc'],true,'str','Product Description');
                $data_insert['product_category']    =  $this->filter->valid($_POST['product_category'],true,'num','Product category');
                $data_insert['product_status']      =  $this->filter->valid($_POST['product_status'],true,'num','Product status');
                $data_insert['product_token']       =  $this->filter->valid($_POST['product_token'],true,'num','Product token');
                
            $update_where = array('product_token' => $pro_token);
            /** update  database */ 
            if(count($res) == 0 AND $this->model->updateToDb('products',$data_insert,$update_where) == true){
                $res['success_insert'] = '<div class="alert alert-success" role="alert">Product has been updated successfully</div>';
                $this->session->setAlert('res',$res); /** set flush alert */
                $this->url->redirect($this->url->makeLink(array('admin','edit_product',$pro_token)));    
                exit() ; 
            }else{
                $res['error_insert'] = '<div class="alert alert-danger" role="alert">Error while updating the product</div>';
                $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','edit_product',$pro_token)));    
                exit() ; 
            }
        }else{
            $pro_token = $this->url->url_segment(3) ;
            if(empty($pro_token)){
                   $this->url->redirect($this->url->makeLink(array('home')));
            }
            $data['product'] = $this->model->selectFromDb('products','*',array('product_token' => $pro_token),1);
                
            $this->loadAdminTemplate('v_product_edit',$data); 
        }
    }
    
    
    public function delete_product(){
        $item = @$this->url->url_segment(3);
        if(!empty($item)){
            if($this->model->deleteFromDb('products',array('product_token'=>$item)) == true){
                $res['error'] = '<div class="alert alert-success" role="alert">Product has been deleted</div>';
                $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','show_products')));    
                exit() ;
            }else{
                $res['error'] = '<div class="alert alert-danger" role="alert">Error while deleting the product</div>';
                $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','show_products')));    
                exit() ;
            }
        }else{
            $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','show_products')));    
                exit() ;
        }
    }
    /** End Products Methods **/ 
    
    /** Categories Methods */ 
    
    public function show_categories(){
        $data['categories']  = $this->model->selectFromDb('categories','*',array(),'');
        $this->loadAdminTemplate('v_show_cats',$data);
    }
    public function add_new_category(){
         
       try{
        
            $data['cats']  = $this->model->selectFromDb('categories','*',array(),'');
            $data['token'] = $this->session->generate_csrf() ;
            
            if($_POST){
                if($this->session->csrf() != true){ /** check if there is no CSRF issue */
                    $res['csrf'] = '<div class="alert alert-danger" role="alert">Request Not Allowed</div>';
                    $this->session->setAlert('res',$res); /** set flush alert */ 
                    $this->url->redirect($this->url->makeLink(array('admin','add_new_category')));    
                    exit() ;
                }
            /** validate and filter inputs */  
            $data_insert['cat_name']   =  $this->filter->valid($_POST['cat_name'],true,'str'); 
            $data_insert['cat_parent'] =  $this->filter->valid($_POST['cat_parent'],false,'num');
            $data_insert['cat_state']  =  $this->filter->valid($_POST['cat_state'],true,'num');
            $data_insert['cat_token']  =  rand(0,9999*89*50);
            /** */
        
            /** Insert into database */ 
            if($this->model->insertToDB('categories',$data_insert) == true){
                $res['insert'] = '<div class="alert alert-success" role="alert">Category has been added successfully</div>' ;
                    $this->session->setAlert('res',$res); /** set flush alert */ 
                    $this->url->redirect($this->url->makeLink(array('admin','add_new_category')));    
                    exit() ;
            }else{
                $res['error_insert'] = '<div class="alert alert-danger" role="alert">Error while adding a new category</div>';
                $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','add_new_category')));    
                exit() ;
            }
        }else{
            $this->loadAdminTemplate('v_admin_cat_add',$data);
        }
            
        
       }catch(Exception $e){
        
            echo $e->getMessage();
       }
         
    }
    public function edit_category(){
          
       try{
        
            $data['cats']  = $this->model->selectFromDb('categories','*',array(),'');
            $data['token'] = $this->session->generate_csrf() ;
           
            if($_POST){
                if($this->session->csrf() != true){ /** check if there is no CSRF issue */
                    $res['csrf'] = '<div class="alert alert-danger" role="alert">Request Not Allowed</div>';
                    $this->session->setAlert('res',$res); /** set flush alert */ 
                    $this->url->redirect($this->url->makeLink(array('admin','edit_category')));    
                    exit() ;
                }
            $pro_token     = $this->filter->valid($_POST['cat_token'],true,'num');
            /** validate and filter inputs */  
            $data_insert['cat_name']   =  $this->filter->valid($_POST['cat_name'],true,'str'); 
            $data_insert['cat_parent'] =  $this->filter->valid($_POST['cat_parent'],false,'num');
            $data_insert['cat_state']  =  $this->filter->valid($_POST['cat_state'],true,'num');
            $data_insert['cat_token']  =  $pro_token ;
            /** */
            $update_where = array('cat_token' => $pro_token);
            /** Insert into database */ 
            if($this->model->updateToDb('categories',$data_insert,$update_where) == true){
                $res['insert'] = '<div class="alert alert-success" role="alert">Category has been added successfully</div>' ;
                    $this->session->setAlert('res',$res); /** set flush alert */ 
                    $this->url->redirect($this->url->makeLink(array('admin','edit_category',$pro_token)));    
                    exit() ;
            }else{
                $res['error_insert'] = '<div class="alert alert-danger" role="alert">Error while adding a new category</div>';
                $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','edit_category',$pro_token)));    
                exit() ;
            }
        }else{
            $pro_token = $this->url->url_segment(3) ;
            if(empty($pro_token)){
                   $this->url->redirect($this->url->makeLink(array('home')));
            }
            $data['category'] = $this->model->selectFromDb('categories','*',array('cat_token' => $pro_token),1);
                
            $this->loadAdminTemplate('v_cat_edit',$data); 
        }
        
            
        
       }catch(Exception $e){
        
            echo $e->getMessage();
       }
        
    }
    public function delete_category(){
        $item = @$this->url->url_segment(3);
        if(!empty($item)){
            if($this->model->deleteFromDb('categories',array('cat_token'=>$item)) == true){
                $res['error'] = '<div class="alert alert-success" role="alert">Category has been deleted</div>';
                $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','show_categories')));    
                exit() ;
            }else{
                $res['error'] = '<div class="alert alert-danger" role="alert">Error while deleting the category</div>';
                $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','show_categories')));    
                exit() ;
            }
        }else{
            $this->session->setAlert('res',$res); /** set flush alert */ 
                $this->url->redirect($this->url->makeLink(array('admin','show_categories')));    
                exit() ;
        }
    }
    /** End Categories Methods */ 
}
?>