<?php

    function is_pjax(){ 
      return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX']; 
    }
    if(is_pjax()){
        if(isset($_POST['site_addr'])){
            $site_addr = $_POST['site_addr'];
            $sql_addr = $_POST['sql_addr'];
            $sql_user = $_POST['sql_user'];
            $sql_password = $_POST['sql_password'];
            $sql_name = $_POST['sql_name'];
            $site_name = $_POST['site_name'];
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
            unlink("./install.php");
            unlink("./install_go.php");
        }
    }

?>