<?php include 'header.php';?>
<?php include 'content-image.php';?>
	
    <div class="container-fluid search-bg">
        <div class="container search">
			<?php include "crumbs.php"; ?>
				
				
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>	
            <div class="search-list">
                <div class="search-title">
                    <h1 ><a href="<?php echo the_permalink() ?>"><?php the_title(); ?></a></h1>
                    <p><?php the_time('Y-n-j') ?></p>
                </div>

                <div class="search-digest">
                    <?php htmlspecialchars(the_excerpt()); ?>
                </div>
            </div>
			<?php endwhile; else :  _e('您要搜索的内容不存在'); endif; ?>
            

            <div class="paging"><?php par_pagenavi(9); ?></div>

        </div>
    </div>
<?php include 'footer.php';?>