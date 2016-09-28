<?php include 'header.php';?>

<!--Slide Begin-->
<div class="container-fluid slide-bg">
    <div class="slide-content">
       <?php if ( function_exists( 'meteor_slideshow' ) ) { meteor_slideshow(); } ?>
    </div>
</div>
<!--Slide End-->

<!--Main One Begin-->
<div class="container-fluid mainone-bg">
    <div class="container">

        <div class="smallslide">
            <?php include 'plugins/smallslide/smallslide.php';?>
        </div>

        <div class="articlelist">
            <div class="articlelist-title">
                <p>
                	<span><?php $cat=get_category_by_slug('test11');  echo $cat->name;?></span>
                	<a href="<?php echo '?cat='.$cat->cat_ID; ?>">MORE+</a>
                </p>
            </div>
            <div class="articlelist-content">
                <ul>
                	<?php query_posts(array('showposts'=>7,'category_name'=>'test11')); while(have_posts()) : the_post(); ?>
                    <li><a href="<?php echo the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="articlelist">
            <div class="articlelist-title">
                <p>
                	<span><?php $cat=get_category_by_slug('test11');  echo $cat->name;?></span>
                	<a href="<?php echo '?cat='.$cat->cat_ID; ?>">MORE+</a>
                </p>
            </div>
            <div class="articlelist-content">
                <ul>
                    <?php query_posts(array('showposts'=>7,'category_name'=>'test11')); while(have_posts()) : the_post(); ?>
                    <li><a href="<?php echo the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<!--Main One End-->


<!--Main Two Begin-->
<div class="container-fluid mainone-bg">
    <div class="container">

        <div class="articlelist articlethree">
            <div class="articlelist-title">
                <p>
                	<span><?php $cat=get_category_by_slug('test11');  echo $cat->name;?></span>
                	<a href="<?php echo '?cat='.$cat->cat_ID; ?>">MORE+</a>
                </p>
            </div>
            <div class="articlelist-content">
                <ul>
                    <?php query_posts(array('showposts'=>7,'category_name'=>'test11')); while(have_posts()) : the_post(); ?>
                    <li><a href="<?php echo the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="articlelist articlefour">
            <div class="articlelist-title">
                <p>
                	<span><?php $cat=get_category_by_slug('test2');  echo $cat->name;?></span>
                	<a href="<?php  echo '?cat='.$cat->cat_ID; ?>">MORE+</a>
                </p>
            </div>
            <div class="articlelist-content">
                <ul>
                    <?php query_posts(array('showposts'=>7,'category_name'=>'test2')); while(have_posts()) : the_post(); ?>
                    <li><a href="<?php echo the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<!--Main Two End-->

<!--Main Three Begin-->
<div class="container-fluid mainone-bg">
    <div class="container">

        <div class="articlelist articlefive">
            <div class="articlelist-title">
                <p>
                	<span><?php $cat=get_category_by_slug('test11');  echo $cat->name;?></span>
                	<a href="<?php echo '?cat='.$cat->cat_ID; ?>">MORE+</a>
                </p>
            </div>
            <div class="articlelist-content">
                <ul>
                    <?php query_posts(array('showposts'=>7,'category_name'=>'test11')); while(have_posts()) : the_post(); ?>
                    <li><a href="<?php echo the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="articlelist articlesix">
            <div class="articlelist-title">
                <p>
                	<span><?php $cat=get_category_by_slug('test11');  echo $cat->name;?></span>
                	<a href="<?php echo '?cat='.$cat->cat_ID; ?>">MORE+</a>
                </p>
            </div>
            <div class="articlelist-content">
                <ul>
                    <?php query_posts(array('showposts'=>7,'category_name'=>'test11')); while(have_posts()) : the_post(); ?>
                    <li><a href="<?php echo the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

        <div class="articlelist articlesix">
            <div class="articlelist-title">
                <p>
                	<span><?php $cat=get_category_by_slug('test11');  echo $cat->name;?></span>
                	<a href="<?php echo '?cat='.$cat->cat_ID; ?>">MORE+</a>
                </p>
            </div>
            <div class="articlelist-content">
                <ul>
                    <?php query_posts(array('showposts'=>7,'category_name'=>'test11')); while(have_posts()) : the_post(); ?>
                    <li><a href="<?php echo the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                    <?php endwhile; ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<!--Main Three End-->

<?php include 'footer.php';?>
