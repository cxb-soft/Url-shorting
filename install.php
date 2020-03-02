



<html>
    <head>
        <title>安装URLSHORTING</title>
        <link rel="stylesheet" href="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/css/mdui.min.css">
        <script src="//cdnjs.loli.net/ajax/libs/mdui/0.4.3/js/mdui.min.js"></script>
        <meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
        <link rel="stylesheet" href="/node_modules/nprogress/nprogress.css">
        <link rel="stylesheet" href="all-a.css">
    </head>
    <style>
        .beauty-mdui{
            padding-right: 5%;
            padding-left: 5%;
        }
    </style>
    <body background='https://www.toptal.com/designers/subtlepatterns/patterns/y-so-serious-white.png'>
        <div id="install-layer">
            <br><br>
            <center><h1>安装</h1></center>
            <div class="beauty-mdui">
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">网站名</label>
                  <input class="mdui-textfield-input" type="text" id="site_name"/>
                </div>
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">网站地址</label>
                  <input class="mdui-textfield-input" type="text" id="site_addr"/>
                </div>
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">数据库地址（暂时只支持MySQL）</label>
                  <input class="mdui-textfield-input" type="text" id="sql_addr"/>
                </div>
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">数据库用户名</label>
                  <input class="mdui-textfield-input" type="text" id="sql_user"/>
                </div>
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">数据库密码</label>
                  <input class="mdui-textfield-input" type="password" id="sql_password"/>
                </div>
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">数据库名</label>
                  <input class="mdui-textfield-input" type="text" id="sql_name"/>
                </div>
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">后台管理主账户(暂未启用)</label>
                  <input class="mdui-textfield-input" type="text" id="back_user"/>
                </div>
                <div class="mdui-textfield">
                  <label class="mdui-textfield-label">后台管理密码</label>
                  <input class="mdui-textfield-input" type="password" id="back_pass"/>
                </div>
                <br>
                <button class="mdui-btn mdui-btn-raised mdui-ripple" onclick="go_install();">安装</button>
                <br>
            </div>
        </div>
    </body>
    <script src="/node_modules/nprogress/nprogress.js"></script>
    <script src="/node_modules/jquery/dist/jquery.js"></script>
    <script src="/node_modules/jquery-pjax/jquery.pjax.js"></script>
    
    <script>
        $(document).on('pjax:start', function() { NProgress.start(); });
        $(document).on('pjax:end',   function() { NProgress.done();  });
        function go_install(){
            var site_addr = $("#site_addr").val()
            var site_name = $("#site_name").val()
            var sql_addr = $("#sql_addr").val()
            var sql_user = $("#sql_user").val()
            var sql_password = $("#sql_password").val()
            var sql_name = $("#sql_name").val()
            var admin_user = $("#back_user").val()
            var admin_password = $("#back_pass").val()
            $.pjax({
                
                url : "./install_go.php",
                type : "post",
                data : {
                    "site_addr" : site_addr,
                    "sql_addr" : sql_addr,
                    "sql_user" : sql_user,
                    "sql_password" : sql_password,
                    "sql_name" : sql_name,
                    "admin_user" : admin_user,
                    "admin_password" : admin_password,
                    "site_name" : site_name
                },
                container : "#install-layer",
                
            })
            console.log(site_addr)
        }
    </script>
</html>