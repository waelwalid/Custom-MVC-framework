<?php
namespace main\w_model;
    /**
     * @Class       Model
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com-2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
    class model extends \main\w_class\autoloading {
        
       private $data = array();
       private $query ;
       private $tableName ;
       public  $connection ;
       public  $where; 
       private $condition ;
       private $limit   ;
       private $columns ; 
       
       public function __construct(){    
            $data       = $this->data ; 
            $query      = $this->query ; 
            $tableName  = $this->tableName ;
            $connection = $this->connection ;
            $where      = $this->where  ; 
            $condition  = $this->condition ;
            $limit      = $this->limit ;
            $columns    = $this->columns ;
       }
       
        public function connect(){
            try{
                $dbConnection = $this->loadClass('database');
                $connection   = $dbConnection->connection();
                return $connection ;
            }catch(exception $e){
                echo $e->getMessage();
            }    
       }
       
       public function insertToDB($tableName,$data){ /** Insert to Database */
        $query = "INSERT INTO `$tableName` SET " ;
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $query.= " $key = '$value' ," ;
                }
                $queryLengh = strlen($query);
                $query      = substr($query,0,$queryLengh-1);
                $connection = self::connect();                                                
                if (!$connection) {
                    printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
                    exit();
                }
                if(!mysqli_query($connection,$query) == true){
                   throw new \exception("Please check Your inputs");  
                }else{
                     mysqli_close($connection) ;
                     return true ;
                      
                }
              }else{throw new \exception("Data is Empty");}
                
            }else{
               throw new \exception("Data Must be array");
            }
            
       }
       
       public function updateToDb($tableName,$data,$where){ /** Update database columns */
        $query = "UPDATE `$tableName` SET " ;
            if(is_array($data)){
                if(!empty($data)){
                    foreach($data as $key => $value){
                    $query.= " $key = '$value' ," ;
                }
                $queryLengh = strlen($query);
                $query      = substr($query,0,$queryLengh-1);
                
                $connection = self::connect();                                                
                
              }else{throw new \exception("Data is Empty");}
                
            }else{
               throw new \exception("Data Must be array");
            }
            if(is_array($where)){
                if(!empty($where)){
                    $query.=" WHERE ";
                    foreach($where as $key => $value){
                    if($condition != true){
                        $query.= " $key = '$value' " ;  
                    }else{
                        $query.= " AND  $key = '$value' " ;
                    }    
                    
                    $condition = true ;
                }
                $queryLengh = strlen($query);
                $query      = substr($query,0,$queryLengh-1);
                
                $connection = self::connect();                                                
                
              }
                
            }else{
               throw new \exception("Where Data Must be array");
            }
            
            
            if (!$connection) {
                    printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
                    exit();
                }
                if(!mysqli_query($connection,$query) == true){
                   throw new \exception(printf("Error Updating: %s\n", mysqli_error()));  
                }else{
                      mysqli_close($connection) ; 
                      return true ;
                } 
       }
       
       public function deleteFromDb($tableName,$where){ /** delete from database */
        $query = "DELETE FROM `$tableName` " ;
            $condition = '' ;
            if(is_array($where)){
                if(!empty($where)){
                    $query.=" WHERE ";
                    foreach($where as $key => $value){
                    if($condition != true){
                        $query.= " $key = '$value' " ;  
                    }else{
                        $query.= " AND  $key = '$value' " ;
                    }    
                    
                    $condition = true ;
                }
                $queryLengh = strlen($query);
                $query      = substr($query,0,$queryLengh-1);
                
                $connection = self::connect();                                                
                
              }
                
            }else{
               throw new \exception("Where Data Must be array");
            }
            
            
            if (!$connection) {
                    printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
                    exit();
                }
                if(!mysqli_query($connection,$query) == true){
                   throw new \exception(printf("Error Deleting: %s\n", mysqli_error()));  
                }else{
                    mysqli_close($connection) ; 
                    return true ; 
                }    
       }
       
       
       public function selectFromDb($tableName='',$columns='',$where=array(),$limit=''){ /** Select From database */
        if(is_array($columns)){ /** you can send your columns as array or "col,col,col"*/
            $columns = implode(',',$columns);
        }
        $query = "SELECT $columns FROM `$tableName` " ;
            $condition = '' ;
            if(is_array($where)){
                if(!empty($where)){
                    $condition = '' ;
                    $query.=" WHERE ";
                    foreach($where as $key => $value){
                    if($condition != true){
                        $query.= " $key = '$value' " ;  
                    }else{
                        $query.= " AND  $key = '$value' " ;
                    }    
                    
                    $condition = true ;
                }
                $queryLengh = strlen($query);
                $query      = substr($query,0,$queryLengh-1);
              }
            
            }else{
               throw new \exception("Where Data Must be array");
            }
            if(!empty($limit)){ /** Check if the Lmimit param in not empty */
                if(!is_integer($limit)){
                    throw new \exception("Limit Must Be Integer");
                }
                $query.= " LIMIT $limit ";          
            } 
            
            $connection = self::connect();
                if (!$connection) {
                    printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
                    exit();
                }   
            
                
                if(!$result = mysqli_query($connection,$query)){
                   throw new \exception(printf("Error Deleting: %s\n", mysqli_error()));  
                }else{
                   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $data[] = $row ;
                   }
                   mysqli_close($connection) ; 
                   return $data ;
                }    
                
       }
       
       
       public function select_query($tableName,$query){ /** Select From database */
        
            $connection = self::connect();
                if (!$connection) {
                    printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
                    exit();
                }   
                if(!$result = mysqli_query($connection,$query)){
                   throw new \exception(printf("Error query: %s\n", mysqli_error()));  
                }else{
                   while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        $data[] = $row ;
                   }
                   mysqli_close($connection) ; 
                   return $data ;
                }    
                
       }
       
    }

 ?>
