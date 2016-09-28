<?php get_header(); ?>
<?php include 'content-image.php';?>

    <div class="container-fluid page-bg">

        <div class="container">
            <div class="page">

                <?php include "sidebar.php"; ?>
				<?php if (have_posts()) : the_post(); ?>
                <div class="article">
                    <?php include "crumbs.php"; ?>
                    <h1><?php the_title();?></h1>
                    <div class="article-content">
                    	<?php the_content(); ?>
                    </div>
                </div>
				<?php endif; ?>
            </div>
        </div>

    </div>

<?php get_footer(); ?>