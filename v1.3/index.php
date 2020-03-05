<?php
    if(!file_exists("config/config.php")){
        header("location:./install.php");
        exit();
    }
    class url_mg{
        function __construct(){
            require_once("config/config.php");
            $this -> db = $db;
        }
        function get_url($shorturl){
            $this -> command = "select * from shorturl where shorturl='$shorturl'";
            $this -> result = mysqli_fetch_assoc(mysqli_query($this -> db , $this -> command));
            if(empty($this -> result)){
                return "not-found";
            }
            else{
                return $this -> result["url"];
            }
        }
    }
    if(isset($_GET['url'])){
        $mg_url = new url_mg;
        $shorturl = substr($_GET["url"],1);
        //echo($shorturl);
        $url = $mg_url -> get_url($shorturl);
        //echo($url);
        //$url = "https://blog.bsot.cn";
        //$url = $_GET['url'];
        //$url[0] = "";
        if($url == "not-found"){
            echo("<center><h2>没有找到该短域</h2></center>");
            exit();
        }
        
        header("location:$url");
    }
    else{
        include("index_main.php");
    }

?>