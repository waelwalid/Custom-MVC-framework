<?php
namespace main\w_class;
    /**
     * @Class       Upload
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com-2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
     
    class upload {
        
	   private $file ;
       private $path ;
       private $error ;
       private $allowed ; 
       public function __construct(){
        
                $file       =  $this->file;
                $path       =  $this->path;
                $error      =  $this->error;
                $allowed    =  $this->allowed;
       }
       
       public function uploadFile($file,$path,$allowed = array()){
        
            $uploadfile = $path . basename($file['name']);
            
            
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            if(!in_array($ext,$allowed) ) {
               return  $result['error'] = 'This Extension in not allowed';
               
            }
            if($file['size'] > (5242880)) {
               return  $result['error'] = 'Maximum size is 5/MB';
                
            }
            $i = 0 ;
            while(file_exists($uploadfile)){
                $i++;
                $count  = strlen(basename($file['name']));
                $name   = substr($file['name'],0,$count-4);
                $ext    = substr($file['name'],$count-4,$count);
                $uploadfile = $path.$name.$i.$ext;
                $rendered = $name.$i.$ext;
            }
            
            if (move_uploaded_file($file['tmp_name'], $uploadfile)) {
                $result['success'] = 'Maximum size is 1/MB';
                $result['file_name'] = @$rendered;
                
                
            } else {
                return $result['error'] = "Error while uploading file !\n";
            }
            
            return $result ;
                
            
       }
     
       
}
    

 ?>
