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
            <div class="posts">
                <?php foreach($posts as $post){  ?>
                <section class="post">
                    <header class="post-header">
                        <img class="post-avatar" alt="Eric Ferraiuolo&#x27;s avatar" height="48" width="48" src="<?php echo getGavatar($post['email']);?>">

                        <h2 class="post-title"><a href="/post/<?php echo $post['id'];?>"><?php echo mb_substr($post['title'],0,20,'utf-8');?></a></h2>

                        <p class="post-meta">
                            By <a class="post-author" href="/?email=<?php echo $post['email'];?>"><?php echo $post['email'];?></a>
                        </p>
                    </header>

                    <div class="post-description">
                        <p><?php echo mb_substr($post['description'],0,150,'utf-8');?>......</p>
                    </div>
                </section>
                <?php } ?>
            </div>
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
</body>
</html>
