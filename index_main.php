<?php

    require_once("config/config.php");
    session_start();
    $_SESSION['db'] = $db;
    $_SESSION['site_name'] = $site_name;

?>

<html>
    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link rel="shortcut icon" href="/favicon.ico" >
	    <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
	    <!--<link rel="stylesheet" href="all-a.css">-->
        <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
        <title><?php echo($site_name); ?></title>
        <link rel="stylesheet" href="/node_modules/nprogress/nprogress.css">
        <link rel="stylesheet" href="all-a.css">
    </head>
    <style>
	    .beauty_mdui{
	        padding-left: 5%;
	        padding-right: 5%;
	    };
	    .footer{
	        margin-bottom: 50px;
	    }
	</style>
	<body class="mdui-appbar-with-toolbar mdui-theme-primary-green mdui-theme-accent-pink mdui-loaded" background='https://www.toptal.com/designers/subtlepatterns/patterns/repeated-square.png' id="admin_page">
	    <div class="mdui-appbar">
    	    <header class="mdui-appbar mdui-appbar-fixed">
                <div class="mdui-toolbar mdui-color-theme">
                    <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white" mdui-drawer="{target: '#main-drawer'}">
                        <i class="mdui-icon material-icons">menu</i>
                    </span>
                    <a href="" class="mdui-typo-title"><?php echo($site_name) ?></a>
                </div>
            </header>
            <div class="mdui-drawer mdui-drawer-close" id="main-drawer">
                <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 68px;">
                    <div class="mdui-list">
                        <a href="javascript:void(0)" onclick="go_index()" class="mdui-list-item">
                            <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                            <div class="mdui-list-item-content">
                                主页
                            </div>
                        </a>
                    </div>
                    <div class="mdui-list">
                        <a href="javascript:void(0)" onclick="go_about()" class="mdui-list-item">
                            <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                            <div class="mdui-list-item-content">
                                关于
                            </div>
                        </a>
                    </div>
                </div>
                    
            </div>
        </div>
        <div class="beauty_mdui" id="pjax-change"><?php require_once('pages/index.php'); ?></div>
        <br><br><br>
        <div class="mdui-divider-dark"></div>
        <center><p id="hitokoto">:D 获取中...</p></center>
        <script src="https://v1.hitokoto.cn/?encode=js&select=%23hitokoto" defer></script>
        <center><p class="mdui-typo">Copyright © 2020 <a href="//blog.bsot.cn">cxbsoft</a>. All rights reserved.</p></center>
    </body>
    <script src="/node_modules/jquery/dist/jquery.js"></script>
    <script src="/node_modules/jquery-pjax/jquery.pjax.js"></script>
    <script src="/node_modules/nprogress/nprogress.js"></script>
    <script>
        
        
            //禁止右键弹出菜单
        document.oncontextmenu = function()
        {
            return false;
        }    
        $(document).on('pjax:start', function() { NProgress.start(); });
        $(document).on('pjax:end',   function() { NProgress.done();  });
        function go_index(){
            $.pjax({
                url : "/pages/index.php",
                container : "#pjax-change"
            })
        }
        function go_about(){
            $.pjax({
                url : "/pages/about.php",
                container : "#pjax-change"
            })
        }
    </script>
</html>