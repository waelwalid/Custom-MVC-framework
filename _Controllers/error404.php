<?php 
namespace main\controllers;

class error404{
    public function index(){
        include ViewsDirectory.'404.php';
    }
    
}
$class = new error404();
?>