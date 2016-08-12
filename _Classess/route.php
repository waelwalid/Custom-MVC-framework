<?php 
namespace main\w_class{
    /**
     * @Class       route
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com - 2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
        class route {
            
            public function routing ($actual_url){
                    $controller = self::url_segment(1) ;
                    $function   = self::url_segment(2) ;
                    $class = '\\main\controllers\\'.$controller;
                    if(!empty($controller)){
                        if(!empty($controller) AND empty($function)){
                            
                            if(isset($controller) AND class_exists($class)){
                                $controller = new $class();
                            }else{
                                $link = self::makeLink(array('error404'));
                                self::redirect($link) ;
                            }
                            if(method_exists($controller,'index')){
                               call_user_func_array(array($controller,"index"), array('')); 
                            }else{
                                $link = self::makeLink(array('error404'));
                                self::redirect($link) ;
                            }
                            
                        }elseif(isset($function) AND !empty($function) AND class_exists($class)){
                            $controller = new $class();
                            if(method_exists($controller,$function)){
                                call_user_func_array(array($controller,$function),array(array()));
                            }else{
                                $link = self::makeLink(array('error404'));
                                self::redirect($link) ;
                            }
                        }else{
                            $class = '\\main\controllers\\error404';
                            $controller = new $class();
                            call_user_func_array(array($controller,'index'),array(array('')));
                        }
                        
                        }else{
                            $class = '\\main\controllers\\home';
                            $controller = new $class();
                            call_user_func_array(array($controller,'index'),array(array('')));
                        }
            }
            public function url_segment($segment){
                $root = $_GET['r'] ;
                if(isset($root)){
                $parameters = explode('/',$root);
                $parameters = array_combine(range(1, count($parameters)), array_values($parameters));
                }else{
                    self::redirect(self::makeLink(array('home')));
                }
                if(isset($parameters[$segment])){
                    return $parameters[$segment] ;
                }
            }
            public function makeLink($params_array = array()){
                if(is_array($params_array)){
                    $link = base_url.implode('/',$params_array).'/';
                    return $link ;
                }else{
                    throw new \Exception ('Link must be array');
                }
            }
            
            public function redirect($link = ''){
                if(!headers_sent()){
                    header('Location:'.$link);
                    exit();
                }else{
                    echo '<script type="text/javascript">
                            window.location.href = '.$link.' 
                        </script><script>' ;
                }
            }
            
        }
    }
?>