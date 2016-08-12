<?php
namespace main\w_class;
    /**
     * @Class       autoloading
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com - 2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
    class autoloading{
        private $class;
        private $view;
        private $model;
        private $controller;
        public $filename ;
        public function __construct(){            
            $class          =   $this->class ;
            $view           =   $this->view ;
            $model          =   $this->model ;
            $controller     =   $this->controller ;
            $filename       =   $this->filename;  
        }
        
        public function checking($filename){ /** public function to check if the file exist */
            $filename = strtolower($filename);
            $paths = explode(PATH_SEPARATOR, get_include_path());
                $found = false;
                    foreach($paths as $path) {
                      $fullname = $path.DIRECTORY_SEPARATOR.$filename.'.php';
                      if(is_file($fullname)) {
                        return $found = true;
                        break;
                      }                       
                                            }
                      if($found == false){
                        throw new \Exception('This file is not exist : '.$filename.'.php');
                                            }
        }
                    
       
        public function loadClass($className){
            if(is_file(ClassDirectory.$className.'.php')){
                require_once ClassDirectory.$className.'.php';
                $class = '\\main\w_class\\'.$className;
                return new $class ; 
            }else{
                throw new \Exception('This class file is not exist : '.ClassDirectory.$className.'.php');
            }
            
        }
        
        public function loadModel($className){
            if(is_file(ModelsDirectory.$className.'.php')){
                require_once ModelsDirectory.$className.'.php';
                $class = '\\main\w_model\\'.$className;
                return new $class ; 
            }else{
                throw new \Exception('This model file is not exist : '.ModelsDirectory.$className.'.php');
            }
        }
        public function loadView($fileName ,$data = array()){
            if(is_file(ViewsDirectory.$fileName.'.php')){
                require_once ViewsDirectory.$fileName.'.php';
            }else{
                throw new \Exception('This view file is not exist : '.ViewsDirectory.$fileName.'.php');
            }
        }
        
        public function loadTemplate($fileName , $data = array()){
            if(is_file(ViewsDirectory.'v_header.php')){
                require_once ViewsDirectory.'v_header.php';
            }else{
                throw new \Exception('This view file is not exist : '.ViewsDirectory.'v_header.php');
            }
            if(is_file(ViewsDirectory.$fileName.'.php')){
                require_once ViewsDirectory.$fileName.'.php';
            }else{
                throw new \Exception('This view file is not exist : '.ViewsDirectory.$fileName.'.php');
            }
            if(is_file(ViewsDirectory.'v_footer.php')){
                require_once ViewsDirectory.'v_footer.php';
            }else{
                throw new \Exception('This view file is not exist : '.ViewsDirectory.'v_header.php');
            }
        }
        
        public function loadAdminTemplate($fileName,$data = array()){
            if(is_file(AdminViewsDirectory.'v_admin_header.php')){
                require_once AdminViewsDirectory.'v_admin_header.php';
            }else{
                throw new \Exception('This view file is not exist : '.AdminViewsDirectory.'v_admin_header.php');
            }
            if(is_file(AdminViewsDirectory.$fileName.'.php')){
                require_once AdminViewsDirectory.$fileName.'.php';
            }else{
                throw new \Exception('This view file is not exist : '.AdminViewsDirectory.$fileName.'.php');
            }
            if(is_file(AdminViewsDirectory.'v_admin_footer.php')){
                require_once AdminViewsDirectory.'v_admin_header.php';
            }else{
                throw new \Exception('This view file is not exist : '.AdminViewsDirectory.'v_admin_header.php');
            }
        }
        
        

        
        
  }   
  
     

        
