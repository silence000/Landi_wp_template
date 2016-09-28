<?php get_header(); ?>
<?php include 'content-image.php';?>
    <div class="container-fluid single-bg">

        <div class="container">
            <div class="single">
                <?php include "sidebar.php"; ?>
				<?php if (have_posts()) : the_post(); ?>
                <div class="article">
                    <?php include "crumbs.php"; ?>
                    <h1><?php the_title();?></h1>
                    <div class="article-info">
                        <span>作者：<?php the_author();?></span>
                        <span>发布时间：<?php the_time("Y年m月d日 H:i:s"); ?></span>
                        <span>浏览数：<?php if(function_exists('the_views')) { the_views('次浏览', true); } ?></span>
                    </div>
                    <div class="article-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="article-backnext">
                        <div class="back"><?php if (get_previous_post()) { previous_post_link('上一条: %link');} else {echo "没有了，已经是最后文章";} ?></div>
                        <div class="next"><?php if (get_next_post()) { next_post_link('下一条: %link');} else {echo "没有了，已经是最新文章";} ?></div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>

    </div>

<?php get_footer(); ?>