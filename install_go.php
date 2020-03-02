<?php

    function is_pjax(){ 
      return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']; 
    }
    if(is_pjax()){
        if(isset($_POST['site_addr'])){
            $site_addr = $_POST['site_addr'];
            $site_name = $_POST['site_name'];
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://soxft.tk/reg.php');
            curl_setopt($curl, CURLOPT_HEADER, 1);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_POST, 1);
            $post_data = array(
                "addr" => "$site_addr",
                "name" => "$site_name"
                );
            curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
            $data = curl_exec($curl);
            curl_close($curl);
            $sql_addr = $_POST['sql_addr'];
            $sql_user = $_POST['sql_user'];
            $sql_password = $_POST['sql_password'];
            $sql_name = $_POST['sql_name'];

            $admin_user = $_POST['admin_user'];
            $admin_password = $_POST['admin_password'];
            $config_php = "
            <?php
                \$db = mysqli_connect( '$sql_addr' , '$sql_user' , '$sql_password' , '$sql_name' );
                \$admin_user = \"$admin_user\";
                \$admin_password = \"$admin_password\";
                \$site_addr = \"$site_addr\";
                \$site_name =\"$site_name\";
            ?>
            ";
            $config = fopen("config/config.php" , 'wb');
            fwrite($config,$config_php);
            $db = mysqli_connect("$sql_addr","$sql_user","$sql_password","$sql_name");
            $command = "CREATE TABLE IF NOT EXISTS shorturl (
                                   shorturl mediumtext NOT NULL, 
                                   url mediumtext NOT NULL
                                ) ENGINE=InnoDB";
            mysqli_query($db,$command);
            echo("成功安装");
            echo("<meta http-equiv=\"Refresh\" content=\"1; url=$site_addr\"/>");
            unlink("./install.php");
            unlink("./install_go.php");
            
        }
    }

?>