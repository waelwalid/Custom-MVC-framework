<?php
namespace main ;
/**
     * @File        Index file
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com-2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
    
    use Exception;
    include 'init.php';
    try{
         $route     = new w_class\route;
         $filter    = $that->loadClass('filter');
         $route->routing($filter->normal($_SERVER['REQUEST_URI']));
    }catch(Exception $e){
        echo $e->getMessage();
    }
    
