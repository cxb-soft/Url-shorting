<?php

    function is_pjax(){
        return array_key_exists('HTTP_X_PJAX', $_SERVER) && $_SERVER['HTTP_X_PJAX'];
    }
    
    if( is_pjax() ){
        
    }
    else{
        header("location:../index.php");
    }

?>


<br><br>

<div class="mdui-card">
    <div class="mdui-card-content">
        <h2>版本：V1.1</h2>
        <p>此版本更新内容：</p>
        <p>&emsp;&emsp;1.加入了短域二维码功能</p>
        <p>&emsp;&emsp;2.短域反查</p>
    </div>
</div>