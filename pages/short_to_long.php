<?php
    
    class short_to_long{
        function __construct(){
            require_once("/config/config.php");
            $this -> db = $db;
        }
        function short_long($short_url){
            $this -> command = "select * from shorturl where shorturl=''";
        }
    }


    function is_pjax(){ 
      return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']; 
    }
    
    if( is_pjax() ){
        
    }

?>