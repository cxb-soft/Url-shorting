<?php
    
    class long_to_short{
        function __construct(){
            require_once("../config/config.php");
            $this -> db = $db;
        }
        function long_short($long_url){
            $this -> command = "select * from shorturl where url='$long_url'";
            $this -> result = mysqli_fetch_all(mysqli_query($this -> db ,$this -> command));
            return $this -> result;
        }
    }


    function is_pjax(){ 
      return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']; 
    }
    
    if( is_pjax() ){
        
    }
    else{
        header("location:../");
        exit();
    }

?>

<?php
    if(isset($_POST['longurl'])){
        $longurl = $_POST['longurl'];
        $selector = new long_to_short;
        $short_urls = $selector -> long_short($longurl);
    }
    else{
        header("location:../");
        exit();
    }

?>
<style>
    @import url("/node_modules/layui-src/dist/css/layui.css");
</style>
<script src="/node_modules/layui-src/dist/layui.js"></script>

<table class="layui-table" lay-even lay-skin="nob">
  <thead>
    <tr>
      <th>短域</th>
      <th>长链接</th>
      <th>二维码</th>
    </tr> 
  </thead>
  <tbody>
    <?php
    
        foreach( $short_urls as $short_url ){
            $short_url_content = $short_url[0];
            echo("<tr>");
            echo("<td>$short_url_content</td>");
            echo("<td>$longurl</td>");
            echo("<td></td>");
            echo("</tr>");
            
        }
    
    ?>
  </tbody>
</table>