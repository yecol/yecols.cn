<!DOCTYPE html>
<html lang="zh-cn">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no">
        <title>
            Yecols.cn
        </title>
        <link type="text/css" rel="stylesheet" href="/assets/css/style.css">
    </head>
    <body>
        <nav class="site-nav" tabindex="-1">
            <button class="site-nav-logo" data-action="open-nav"><span class="reader-text">HOME</span></button>
            <div class="nav-list-container">
                <ul class="nav-list">
                    <li class="nav-list-item">
                        <a href="#"><span class="reader-text">Navigation</span></a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/photos/">Photos</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/blog/">Blog</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/portfolio/">Portfolio</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/lab/">Lab</a>
                    </li>
                    <li class="nav-list-item">
                        <a href="/about/">About</a>
                    </li>
                </ul>
            </div>
        </nav><!--PAGE MODULE-->
        <div id="main" role="main" class="container">
            <section id="about">
                <div class="content">
                    <div class="title">
                        <h1>Yecol Hsu</h1>
                        <h2>Ph.D. Student at Beihang University</h2>

                        <ul>
                            <li>
                            <span class="location">Beijing, China.</span>
                            </li>
                            <li>
                            <span class="email">xujb1987(a)gmail.com</span>
                            </li>
                            <li>
                            <span class="qq">148269281</span>
                            </li>
                        </ul>
                    </div>
                    <div class="intro">
                        <p>
                            计算机学科的码农。喜欢摄影。
                        </p>
                    </div>
                    <div class="social">
                        <p>
                            我的社交圈
                        </p>
                    </div>
                </div>
                <div class="photo"></div>
                </div>
            </section><!-- #about -->
        </div><!--FOOTER-->
        <footer>
            <div id="wrap">
                <div class="nav">
                    <a href="/photos/" title="摄影">Photos</a> <a href="/blog/" class="ac" title="文字">Blog</a> <a href="/portfolio/" title="作品集">Portfolio</a> <a href="/lab/" title="试验">Lab</a> <a href="/about/" title="关于">About</a>
                </div>
                <div class="search">
                    <div class="input-append">
                        <input class="span2" id="appendedInputButton" type="text"> <button class="btn" type="button">Search</button>
                    </div>
                </div>
                <div class="info">
                    <div class="copyright">
                        ©Jingbo Xu<br>
                        浙ICP备08101950号
                    </div>
                    <div class="social">
                        <a href="http://www.linkedin.com/pub/jingbo-xu/7a/427/532" id="linkedin" target="blank"></a> <a href="https://www.facebook.com/yecolhsu" id="facebook" target="blank"></a> <a href="http://weibo.com/yecol" id="weibo" target="blank"></a>
                    </div>
                </div>
            </div>
        </footer><!--JAVASCRIPT-->
        <script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.9.1/jquery-1.9.1.min.js">
</script><script type="text/javascript" src="/assets/js/tooltip.js">
</script><script type="text/javascript">
$(document).ready(function(){
        $('footer .nav a').tooltip();
        $(".container-head").width($("#photos").width()+80);
        });
        $(window).resize(function(){
        $(".container-head").width($("#photos").width()+80);
        });
        </script><!--GOOGLE ANALYTICS-->
        <script type="text/javascript">

        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-9074876-1']);
        _gaq.push(['_trackPageview']);

        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();

        </script><!--PAGE END-->
    </body>
</html>