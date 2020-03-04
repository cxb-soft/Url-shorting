


<br><br>
<!--<div class="mdui-chip">
    <span class="mdui-chip-title">Example Chip</span>
</div>-->
<div class="mdui-card">
    <div class="mdui-card-content">
        <div class="mdui-textfield mdui-textfield-floating-label" style="width : 95%">
          <label class="mdui-textfield-label">短链接</label>
            <input class="mdui-textfield-input" type="text" id="short_url"/>
        </div>
        <button class="mdui-fab mdui-ripple" onclick="go_long()"><i class="mdui-icon material-icons">arrow_forward</i></button>
    </div>
    
</div>



<script>
    function go_long(){
        var short_url = $("#short_url").val()
        console.log(short_url)
        $.pjax({
            url : "/pages/short_to_long.php",
            container : "#pjax-change",
            type : "post",
            data : { "short_url" : short_url }
        })
    }
</script>