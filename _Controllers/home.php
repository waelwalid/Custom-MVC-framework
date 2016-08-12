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

class home extends \main\w_class\autoloading {
    
    public function index(){
        try{
            $this->loadTemplate('v_home');
        }catch(Exception $e){
            echo $e->getMessage();
        }
        
    }
    public function single(){
        $this->loadTemplate('v_single');
    }

}
?>