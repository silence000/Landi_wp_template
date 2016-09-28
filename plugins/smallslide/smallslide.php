<div id="smallslide">
    <div id="smallslide_bg"></div>
    <!--标题背景-->
    <div id="smallslide_info"></div>
    <!--标题-->
    <ul>
        <li class="on">1</li>
        <li>2</li>
        <li>3</li>
        <li>4</li>
        <li>5</li>
    </ul>
    <div id="smallslide_list">
    	<?php query_posts(array('showposts'=>-1,'category_name'=>'test11'));  ?> 
   		<?php if ( have_posts() ):  ?>  
        <?php $i = 0; while ( have_posts() ) :  ?>  
        <?php the_post(); ?>  
        <?php if( has_post_thumbnail() ) :?>  
    	<?php if($i === 5) : break; endif;?> 
        <a href="<?php echo the_permalink() ?>">
        	<img src="<?php $url = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); echo $url; ?>" alt="<?php the_title(); ?>"/>
        </a>
       <?php $i++; endif; ?>  
          <?php endwhile; ?>     
     <?php endif;?>  
    </div>
</div>

