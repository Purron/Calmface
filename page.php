<?php get_header(); ?>
<?php include 'topbar.php';?>
        
<?php if ( has_post_thumbnail() ) : ?>
<div class="h-pic" style="background-image: url(<?php the_post_thumbnail_url(); ?>)"></div>
<?php endif; ?>
            
        <div class="wrap">
            <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
            <div class="article">
                <h1><?php the_title(); ?></h1>
                <div class="divi"><hr /></div>
                
                <?php the_content(); ?>
                
            </div>
            
            <?php else : ?>
            <div class="grid_8">
                没有找到你想要的页面！
            </div>
            <?php endif; ?>
</div>
            <?php get_footer(); ?>