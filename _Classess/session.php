<?php
namespace main\w_class;
    /**
     * @Class       Session
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com-2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
    class session {
	   public $data = array();
       
       public function __construct(){
            $_SESSION =& $this->data ;
       }
       public function csrf(){ 
                // Check a POST is valid.
                if (isset($_POST['csrf_token']) && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
                    $_SESSION['csrf_token'] = md5(uniqid(rand()));
                    return true ;
                }else{
                    return false;
                }
       }
       public function generate_csrf(){
        if (! isset($_SESSION['csrf_token'])) {
                    $_SESSION['csrf_token'] = md5(uniqid(rand()));
                }
                return $_SESSION['csrf_token'] ;
       }
       public function starter(){
        if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
       }
       public function setAlert ($key,$value){
            if(!empty($key) AND !empty($value)){
               $_SESSION[$key] = $value ;
            }
       }
       
       public function setSession ($key,$value){
            if(!empty($key) AND !empty($value)){
               $_SESSION[$key] = $value ;
            }
       }
       public function getSession ($key){
            if(!empty($key)){
                if(is_array(@$_SESSION[$key])){
                   foreach(@$_SESSION[$key]  as $value){
                    echo $value ;
                   }
                  
                }else{
                    echo @$_SESSION[$key] ;
                }  
                unset($_SESSION[$key]);
            }
       }
       public function getAlert ($key){
            if(!empty($key)){
                if(is_array(@$_SESSION[$key])){
                   foreach(@$_SESSION[$key]  as $value){
                    echo $value ;
                   }
                  
                }else{
                    echo @$_SESSION[$key] ;
                }  
                unset($_SESSION[$key]);
            }
       }
        
    }

 ?>
