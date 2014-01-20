<!doctype html>
<html>
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="一个简单的任务发布平台">
    <title>格格屋</title>
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
<link rel="stylesheet" href="/css/index.css">
<link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon" />
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
</head>
<body>
<div class="pure-g-r" id="layout">
    <div class="sidebar pure-u">
        <header class="header">
            <hgroup>
                <h1 class="brand-title">格格屋</h1>
                <h2 class="brand-tagline">一个简单的任务发布平台</h2>
            </hgroup>

            <nav class="nav">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a class="pure-button" href="/">首页</a>
                    </li>
                    <li class="nav-item">
                        <a class="pure-button" href="/release.html">发布</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="pure-u-1">
        <div class="content">
            <form class="pure-form" style="text-align:center;">
                <fieldset>
                    <input type="text" data-id="<?php echo $id;?>" class="pure-input-1-2" name="token" placeholder="校验码"/>
                </fieldset>    
                <button type="submit" class="pure-button pure-input-1-2 pure-button-primary" id="submit">验证</button>
            </form>
            <footer class="footer">
                <div class="pure-menu pure-menu-horizontal pure-menu-open">
                    <ul>
                        <li><a href="/about.html">关于格格屋</a></li>
                        <li><a href="/"> 2013 gogowo.net, all rights reserved</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>
</div>
<script src="http://yui.yahooapis.com/3.12.0/build/yui/yui-min.js"></script>
<script>
YUI().use('node-base', 'node-event-delegate', function (Y) {
    // This just makes sure that the href="#" attached to the <a> elements
    // don't scroll you back up the page.
    Y.one('body').delegate('click', function (e) {
        e.preventDefault();
    }, 'a[href="#"]');
});
</script>
<script type="text/javascript">
    $('#submit').click(function() {
    $('#submit').attr('disabled',true);
    var token = $('input[name="token"]').val();
    var id = $('input[name="token"]').data('id');
    $.ajax({
        url: '/post/'+id,
        type: 'put', 
        data: {"token": token }, 
        success: function(data){
            if(data.status == 'error'){
                $('#submit').attr('disabled',false);
                alert(data.message);
            }else if(data.status == 'success'){
                window.location.reload();
            }else{
                $('#submit').attr('disabled',false);
                alert('内部错误');
            }
        }
    });
  });
</script>
</body>
</html>
