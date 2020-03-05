<?php
    
    class url_mg{
        function __construct(){
            require_once("../config/config.php");
            $this -> db = $db;
            $this -> http = $http;
            return $http;
            //$db = mysqli_
        }
        function is_url($url){
            $r = "/http[s]?:\/\/[\w.]+[\w\/]*[\w.]*\??[\w=&\+\%]*/is";
            if(preg_match($r,$url)){
                //return true;
                return true;
            }else{
                return false;
            }
        }
        function create_short( $length = 5 ) { 
            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'; 
            $shorturl = ""; 
            for ( $i = 0; $i < $length; $i++ ) 
            { 
                $shorturl .= $chars[ mt_rand(0, strlen($chars) - 1) ]; 
            } 
            return $shorturl; 
        } 
        function sql_check( $value ) { 
            if(!get_magic_quotes_gpc()) { 
                $value = addslashes($value); 
            } 
            $value = str_replace("_", "\_", $value); 
            $value = str_replace("%", "\%", $value); 
            return $value;
        }
        function to_short($long_url){
            $shorturl = $this -> create_short();
            $long_url = $this -> sql_check($long_url);
            $this -> command = "insert into shorturl values('$shorturl','$long_url')";
            mysqli_query($this -> db,$this -> command);
            return $shorturl;
        }
    }
    function is_pjax(){ 
      return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']; 
    }
    if(is_pjax()){
emmm:
        if(isset($_POST['long_url'])){
            session_start();
            $mg_url = new url_mg;
            $long_url = $_POST['long_url'];
            if($mg_url -> is_url($long_url)){
                $long_url = $mg_url -> sql_check($long_url);
                $shorturl = $mg_url -> to_short($long_url);
                $server = $_SERVER['HTTP_HOST'];
                //echo($http.$server."/$shorturl");
            }
            else{
                echo("<br><br><center><h2>请输入一个合法的url</h2></center>");
                echo("<script>setTimeout('go_index()',2000)</script>");
                exit();
            }
            
        }
        else{
            if(is_pjax()){
                //goto emmm;
            }
            else{
                echo("
                    <center><h2>请使用首页创建短链接，即将跳转...</h2></center>
                
                ");
                //$mg_url = new url_mg;
                $server = $_SERVER['HTTP_HOST'];
                header("location:http://$server");
                exit();
            }
        }
    }
    else{
        $server = $_SERVER['HTTP_HOST'];
        header("location:http://$server");
        echo("<h2>刷你个头数据库</h2>");
        exit();
    }
?>

<br><br><br><br>
<center>
    <h2>网址缩短成功</h2>
    <div class="mdui-typo"><a target="_blank" href="<?php echo("http://".$server."/$shorturl") ?>"><?php echo("http://".$server."/$shorturl") ?></a></div>
    <br><br>
    <img src="http://qr.liantu.com/api.php?text=<?php echo("http://".$server."/$shorturl") ?>"/>
</center>