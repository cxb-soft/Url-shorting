<?php
    
    class short_to_long{
        function __construct(){
            require_once("../config/config.php");
            $this -> db = $db;
        }
        function short_long($short_url){
            $this -> command = "select * from shorturl where shorturl='$short_url'";
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
    if(isset($_POST['shorturl'])){
        $shorturl = $_POST['shorturl'];
        $selector = new short_to_long;
        $long_urls = $selector -> short_long($shorturl);
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
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>
  <thead>
    <tr>
      <th>短域</th>
      <th>长链接</th>
      <th>二维码</th>
    </tr> 
  </thead>
  <tbody>
    <?php
    
        foreach( $long_urls as $long_url ){
            $long_url_content = $long_url[1];
            echo("<tr>");
            echo("<td>$shorturl</td>");
            echo("<td>$long_url_content</td>");
            echo("<td></td>");
            echo("</tr>");
            
        }
    
    ?>
  </tbody>
</table>