


<br><br>
<!--<div class="mdui-chip">
    <span class="mdui-chip-title">Example Chip</span>
</div>-->
    <div class="mdui-textfield mdui-textfield-floating-label" style="width : 95%">
        <label class="mdui-textfield-label">管理员用户</label>
        <input class="mdui-textfield-input" type="text" id="username"/>
    </div>
    <div class="mdui-textfield mdui-textfield-floating-label" style="width : 95%">
        <label class="mdui-textfield-label">管理员密码</label>
        <input class="mdui-textfield-input" type="password" id="password"/>
    </div>
    <button class="mdui-fab mdui-ripple" onclick="login()"><i class="mdui-icon material-icons">arrow_forward</i></button>



<script>
    function login(){
        var password = $("#password").val()
        var username = $("#username").val()
        $.pjax({
            url : "/admin/login_auth.php",
            container : "#pjax-change",
            type : "post",
            data : {
                "username" : username,
                "password" : password
            }
        })
    }
</script>