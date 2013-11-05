<{extends file="index.tpl"}>

<{block "content"}>
<div id="main" role="main" class="container">
 <section id="photos-album">
 
    <div class="a-album">
        <a class="origin" href="./travel-nanjing.php">
            <img src="cover/nanjing.jpg" class="thumb">
            <span class="info">
                <p class="title travel">Travel Log. 南京</p>
                <p class="date">2013-09-29</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./travel-bali.php">
            <img src="cover/bali.jpg" class="thumb">
            <span class="info">
                <p class="title travel">Travel Log. 巴厘岛</p>
                <p class="date">2013-06-12</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./travel-taiwan.php">
            <img src="cover/taiwan.jpg" class="thumb">
            <span class="info">
                <p class="title travel">Travel Log. 台湾</p>
                <p class="date">2012-12-17</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./travel-japan.php">
            <img src="cover/japan.jpg" class="thumb">
            <span class="info">
                <p class="title travel">Travel Log. 日本</p>
                <p class="date">2012-06-20</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./travel-yunnan.php">
            <img src="cover/yunnan.jpg" class="thumb">
            <span class="info">
                <p class="title travel">Travel Log. 毕业旅行，云南。</p>
                <p class="date">2013-01-21</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./portraits.php">
            <img src="cover/faces.jpg" class="thumb">
            <span class="info">
                <p class="title camera">Faces. 人像</p>
                <p class="date">2012-02-17</p>
            </span>
        </a>
    </div>


    <div class="a-album">
        <a class="origin" href="./life-beijing.php">
            <img src="cover/beijing.jpg" class="thumb">
            <span class="info">
                <p class="title camera">Live in Beijing. 北漂生活</p>
                <p class="date">2012-02-17</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./life-hangzhou.php">
            <img src="cover/hangzhou.jpg" class="thumb">
            <span class="info">
                <p class="title camera">Live in Hangzhou. 大学，杭州。</p>
                <p class="date">2012-02-17</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./landscape.php">
            <img src="cover/landscape.jpg" class="thumb">
            <span class="info">
                <p class="title camera">Landscape. 风光</p>
                <p class="date">2012-02-17</p>
            </span>
        </a>
    </div>


    <div class="a-album">
        <a class="origin" href="./animal-plant.php">
            <img src="cover/animal.jpg" class="thumb">
            <span class="info">
                <p class="title camera">Animal and Plant. 动植物</p>
                <p class="date">2012-02-17</p>
            </span>
        </a>
    </div>

    <div class="a-album">
        <a class="origin" href="./iphone.php">
            <img src="cover/iphone.jpg" class="thumb">
            <span class="info">
                <p class="title phone">By iPhone. 手机，随手拍。</p>
                <p class="date">2012-02-17</p>
            </span>
        </a>
    </div>
  </section><!-- #photos-album -->
</div>
<{/block}>

<{block "photos-ac"}>
class="ac"
<{/block}>

<{block "js" append}>
<script type="text/javascript">
$(document).ready(function(){
    $('footer .nav a.ac').tooltip({trigger:'manual'}).tooltip('show');
    $('footer .nav a').not('.ac').tooltip();
});
$(window).resize(function(){
    $('footer .nav a.ac').tooltip({trigger:'manual'}).tooltip('show');
});
</script>
<{/block}>