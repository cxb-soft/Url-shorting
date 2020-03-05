


<br><br>
<!--<div class="mdui-chip">
    <span class="mdui-chip-title">Example Chip</span>
</div>-->
<div class="mdui-card">
    <div class="mdui-card-content">
        <div class="mdui-textfield mdui-textfield-floating-label" style="width : 95%">
          <label class="mdui-textfield-label">长链接</label>
            <input class="mdui-textfield-input" type="text" id="long_url"/>
        </div>
        <button class="mdui-fab mdui-ripple" onclick="short_url()"><i class="mdui-icon material-icons">arrow_forward</i></button>
    </div>
    
</div>



<script>
    function short_url(){
        var long_url = $("#long_url").val()
        console.log(long_url)
        $.pjax({
            url : "/pages/short.php",
            container : "#pjax-change",
            type : "post",
            data : { "long_url" : long_url }
        })
    }
</script>