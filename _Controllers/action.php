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

class action extends \main\w_class\autoloading {
    
    public function index(){
        echo "welcome from action";
    }
    public function say_welcome(){
        echo "Welcome from say_welcome function";
        //print_r($_GET);
    }
    public function say_hello(){
        /*$route = $this->loadClass('route');
        $link  = array('action','say_welcome');
        $route->redirect($route->makeLink($link));*/
       /* $model = $this->loadModel('model');
        $data = array('name' => rand(0,15),'main'=>rand(0,15) , "text" => rand(0,15));
        $where = array('name' => 1,'main'=>11 , "text" => 4);
        
        print_r($model->selectFromDb('test','*',array(),'')) ;*/
        /*$session = $this->loadClass('session');
        $session->data['test'] = 'wael';
        print_r($session->data);*/
        //$view = $this->loadView('404');
        //echo 
        
    }
}
?>