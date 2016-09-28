<?php include 'header.php';?>
<?php include 'content-image.php';?>
<div class="container-fluid category-bg">

    <div class="container">
        <div class="category">
            <?php include "sidebar.php"; ?>

            <div class="categoryright">
            	<?php include "crumbs.php"; ?>
                <div class="articlelist-content">
                    <ul>
                    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <li><a href="<?php the_permalink() ?>">>&nbsp;<?php the_title(); ?></a><span><?php the_time('Y-m-d'); ?></span></li>
                   		<?php endwhile; else: ?>
							<p>该目录下暂时没有文章</p>
						<?php endif; ?>
                    </ul>
                </div>
				<div class="paging"><?php par_pagenavi(9); ?></div>

            </div>
        </div>
    </div>

</div>
<?php include 'footer.php';?>