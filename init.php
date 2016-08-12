<?php

namespace main;
    /**
     * @File        Init file 
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com-2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
     
    
    /** Database configuration */
    define('DB_host','localhost');
    define('DB_name','blog');
    define('DB_username','root');
    define('DB_password','secret');

    /** Directories definations */
    define('site_url','http://'.$_SERVER['HTTP_HOST'].DIRECTORY_SEPARATOR); /** ex: http://domain.com  if this is subfoler you add it here */
    define('base_url','http://'.$_SERVER['HTTP_HOST'].'/?r=');         
    define('base_bath',dirname(realpath(__FILE__)).DIRECTORY_SEPARATOR);
    define('ClassDirectory',base_bath.'_Classess'.DIRECTORY_SEPARATOR);
    define('ControllersDirectory',base_bath.'_Controllers'.DIRECTORY_SEPARATOR);
    define('ModelsDirectory',base_bath.'_Models'.DIRECTORY_SEPARATOR);
    define('ViewsDirectory',base_bath.'_Views'.DIRECTORY_SEPARATOR);
    define('AdminViewsDirectory',base_bath.'_Views'.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR);
    define('ResourcesDirectory',site_url."resources/");
    define('AdminResourcesDirectory',site_url."resources/admin/");
    define('DefaultController','home');
    /** Define Include Paths */
    define('IncludePath',get_include_path().
    PATH_SEPARATOR.base_bath.
    PATH_SEPARATOR.ClassDirectory.
    PATH_SEPARATOR.ModelsDirectory.
    PATH_SEPARATOR.ViewsDirectory.
    PATH_SEPARATOR.ControllersDirectory);
    
    set_include_path(IncludePath);                      /** Set include path for all script */
    require_once ClassDirectory.'autoload.php';         /** Include Autoload Class */
    $that = new  w_class\autoloading();    
    function loader($filename){
        $filename = explode('\\',strtolower($filename));
        $filename = end($filename);
            $paths = explode(PATH_SEPARATOR, get_include_path());
                $found = false;
                    foreach($paths as $path) {
                      $fullname = $path.DIRECTORY_SEPARATOR.$filename.'.php';
                      if(is_file($fullname)) {
                        require_once $fullname ;
                        return $found = true;
                        break;
                      }
                    }
                    if($found == false){
                        /*header('Location:'.base_url.'error404');
                        exit();*/
                    }
    }
    if(!spl_autoload_register('\main\loader')){
        throw new \Exception("Error Loading Class");
    }

    

?>
