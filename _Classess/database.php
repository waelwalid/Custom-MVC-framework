<?php
namespace main\w_class;
    /**
     * @Class       database
     * @package     Simple Framework  
     * @author      Wael walid | Mokawed.com
     * @copyright   Mokawed.com-2016
     * @contact     Wael.walid91@gmail.com | 01271133369
     * @version     1.0
     * @access      public
     */
    class database {
	   private $hostname    = DB_host;
       private $dbname      = DB_name;
       private $username    = DB_username;
       private $password    = DB_password;
       public function __construct(){
                error_reporting(0);
                $hostname = $this->hostname;
                $dbname   = $this->dbname;
                $username = $this->username;
                $password = $this->password;
       }
       public function connection(){
            if(mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname) == true){
                    return $connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->dbname) ;
            }else{
                    throw new \Exception('Cannot connect to the database please check the configuration file');
            }
                      
       }
       
    }

 ?>
