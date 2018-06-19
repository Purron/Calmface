<?php get_header(); ?>

<div class="wrap">

    <?php if ( have_posts() ) : ?>

    <div class="archive-category">
        <?php
        the_archive_title( '<h1>', '</h1>' );
        the_archive_description( '<h2>', '</h2>' );
        ?>
        <div class="divi archive"><hr /></div>
    </div>


    <!--内容-->

    

    <div class="content-index">
        <?php while ( have_posts() ) : the_post(); ?>
        
        <div class="content-item" id=”post-<?php the_ID(); ?> style="background:url(<?php the_post_thumbnail_url( array(398, 264) ); ?>) no-repeat center center;background-size: cover;">
            <a href="<?php the_permalink(); ?>">
            <div class="overlay-content">
                <p class="time"><?php the_time('y/n/j') ?></p>
                <p class="category"><?php  
                foreach((get_the_category()) as $category)  
                {  
                echo $category->cat_name;  
                }  
                ?></p>
                <p class="title"><?php the_title(); ?><p>
                <p class="tag"><span><?php the_tags('#', ' &nbsp;', ''); ?></span></p>
            </div>
            </a>
        </div>

    <?php endwhile; ?>
    <?php else : ?>

    <p>没有找到任何文章！</p>

    <?php endif; ?>
        
    </div>

    <!--翻页-->

    <div class="page">
        <p class="newer"><?php previous_posts_link('Newer', 0); ?></p>
        <p class="older"><?php next_posts_link('Older', 0); ?></p>
    </div>

</div>

<?php get_footer(); ?>