	<div id="primary" class="sidebar">     
        <div id="catalogue" class="siderBlock">
        <div class="header">Catalogue</div>
        <ul class="feature-nav" id="head_nav">
		  <li class="posters">
				<a href="?cat=5">有点感想/Feel</a>			</li>
		  <li class="site">
				<a href="?cat=6">胡乱地说/Scribble</a>			</li>
		  <li class="slides">
				<a href="?cat=3">不断学习/Approaching</a>			</li>
		  <li class="program">
				<a href="?cat=4">写点东西/Original</a>			</li>
			<li class="others">
			<a href="?cat=7">记录生活/Record</a>			</li>
		</ul></div>

      <?php if (function_exists('get_recent_comments')) { ?>
        <div id="comments" class="siderBlock"> 
        <div class="header">Comments</div>
        <div class="innerSideBox"><ul><?php get_recent_comments(); ?></ul></div>      
        </div>
      <?php } ?>
      
        <div id="tag_cloud" class="siderBlock">
            <div class="header">Tags</div>
			<div class="inSiderBlock"><?php wp_tag_cloud('smallest=8largest=18number=30orderby=count') ?></div>
		</div>
      
       
     <?php if (is_home()) { ?>
        <div id="recentPost" class="siderBlock">
            <div class="header">Recent</div>
			<div class="innerSideBox"><?php recent_posts(); ?></div>
		</div>
     <?php } ?>
     
    <?php if (is_single()) { ?>
    <div id="recentPost" class="siderBlock">
            <div class="header">Random</div>
			<div class="innerSideBox"><?php random_posts(); ?> </div>
		</div>
     <?php } ?>
        
       
       <div id="usedtoImage" class="siderBlock">
            <div class="header">Former</div>
                        
            <div id="usedto_block"><div id="usedto"> 
            <a href="http://yecols.cn/zblog">
            <img src="http://yecols.cn/images/formerskin.png" border="0" />
		    </a></div>
            </div>
            <div id="usedto_block"> 
            <div id="usedto"><a href="http://blog.sina.com.cn/ddolphin">
            <img src="http://yecols.cn/images/wheninsina.png" border="0" />
		    </a></div>
            </div>            
		</div>
        
        <div id="archive" class="siderBlock">
            <div class="header">Archives</div>
			<div class="innerSideBox"><ul><?php wp_get_archives('type=monthly') ?></ul></div>
		</div>


     </div><!-- #primary .sidebar -->