<?php
namespace main\w_class;


    /**
     * @Class       Filter
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com-2016
     * @contact     Wael.walid91@gmail.com
     * @version     1.0
     * @access      public
     */
    class filter {
        
	   private $data ;
       
       public function valid($data = 'data',$required = 'true or false' ,$type = 'str OR num OR email OR url OR ip'/**'str,num','email','url','ip'**/){
            /** Data can be array or variable */ 
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                        if($required == true){ /** check if the input var is required */
                            if(empty($data)){
                                throw new \exception("fields with * are required fields");
                            }
                        }  
                    }
                }
            }else{
                if($required == true){
                    if(empty($data)){
                                throw new \exception("fields with * are required fields");
                                }
                }
                
            }
                        $array_types = array('str','num','email','url','ip'); /** types list */
                        
                        if(!in_array($type,$array_types)){
                            throw new \exception("This type of is not supported , only (str,num,email,url,ip)");
                        }
                        if($type == 'str'){
                           $validated  = self::filterString($data);
                        }elseif($type == 'num'){
                            $validated = self::filterInteger($data);
                        }elseif($type == 'email'){
                            $validated = self::filterEmail($data);
                        }elseif($type == 'url'){
                            $validated = self::filterUrl($data);
                        }elseif($type == 'ip'){
                            $validated = self::filterIP($data);
                        }else{
                            throw new \exception("This type of is not supported , only (str,num,email,url,ip)");
                        }
                        /** Data can be array or variable */ 
        
                return $validated ;
       }
       public function normal($data){
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $filtered[$key] = trim(htmlspecialchars(htmlentities($value))); ;
                }
              }else{throw new \exception("Data is Empty");}
                
            }else{
                $filtered = trim(htmlspecialchars(htmlentities($data)));
            }
            return $filtered ;
       }
       public function filterString($data){
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $filtered[$key] = trim(htmlspecialchars(htmlentities(filter_var($value,FILTER_SANITIZE_STRING)))); ;
                }
              }else{throw new \exception("Data is Empty");}
                
            }else{
                $filtered = trim(htmlspecialchars(htmlentities(filter_var($data,FILTER_SANITIZE_STRING))));
            }
            return $filtered ;
       }
       
       public function filterInteger($data){
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $filtered[$key] = trim(htmlspecialchars(htmlentities(filter_var($value,FILTER_SANITIZE_NUMBER_INT)))); ;
                }
              }else{throw new \exception("Data is Empty");}
                
            }else{
                $filtered = trim(htmlspecialchars(htmlentities(filter_var($data,FILTER_SANITIZE_NUMBER_INT))));
            }
            return $filtered ;
       }
       
       public function filterEmail($data){
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $filtered[$key] = trim(htmlspecialchars(htmlentities(filter_var($value,FILTER_VALIDATE_EMAIL)))); ;
                }
              }else{throw new \exception("Data is Empty");}
                
            }else{
                $filtered = trim(htmlspecialchars(htmlentities(filter_var($data,FILTER_VALIDATE_EMAIL))));
            }
            return $filtered ;
       }
       public function filterUrl($data){
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $filtered[$key] = trim(htmlspecialchars(htmlentities(filter_var($value,FILTER_VALIDATE_URL)))); ;
                }
              }else{throw new \exception("Data is Empty");}
                
            }else{
                $filtered = trim(htmlspecialchars(htmlentities(filter_var($data,FILTER_VALIDATE_URL))));
            }
            return $filtered ;
       }
       public function filterIP($data){
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $filtered[$key] = trim(htmlspecialchars(htmlentities(filter_var($value,FILTER_VALIDATE_IP)))); ;
                }
              }else{throw new \exception("Data is Empty");}
                
            }else{
                $filtered = trim(htmlspecialchars(htmlentities(filter_var($data,FILTER_VALIDATE_IP))));
            }
            return $filtered ;
       }
       
       
       
    }

 ?>
