<!--        头部导航-->

<?php get_header(); ?>
        
<!--        特色图片-->

<?php if ( has_post_thumbnail() ) : ?>
<div class="h-pic" id="h-pic" style="background-image: url(<?php the_post_thumbnail_url('full'); ?>)">
    <span class="category"><?php  
                        foreach((get_the_category()) as $category)  
                        {  
                        echo $category->cat_name;  
                        }  
                        ?></span>
</div>
<?php endif; ?>
        
<!--        画布区域-->
        
<div class="wrap">

<!--        文章区域-->
    
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

<div class="article">
    <h1><?php the_title(); ?></h1>
    <p class="tag"><?php the_tags('# ', ' &nbsp;# ', ' '); ?></p>
    <p class="time"><?php the_time('y/m/j') ?></p>

<?php else : ?>

    <h1>没有文章！</h1>

<?php endif; ?>

    <div class="divi"><hr /></div>

<!--        文章内容-->
    
<?php the_content(); ?>

    <div class="divi"><hr /></div>

</div>


<!--        相关文章-->
    
    
<div class="content-index">
    <h1 class="relate-post">相关文章</h1>

    <?php
    global $post;
    $cats = wp_get_post_categories($post->ID);
    if ($cats) {
    $args = array(
          'category__in' => array( $cats[0] ),
          'post__not_in' => array( $post->ID ),
          'showposts' => 3,
          'caller_get_posts' => 1
      );
    query_posts($args);

    if (have_posts()) {
    while (have_posts()) {
      the_post(); update_post_caches($posts); ?>

    <div class="content-item" id=”post-<?php the_ID(); ?> style="background:url(<?php the_post_thumbnail_url( array(398, 264) ); ?>) no-repeat center center;background-size: cover;">

                    <a href="<?php the_permalink(); ?>">
                        <div class="overlay-content">
                            <p class="time"><?php the_time('y/m/j') ?></p>
                            <p class="category"><?php  
                                foreach((get_the_category()) as $category)  
                                {  
                                echo $category->cat_name;  
                                }  
                                ?>  </p>
                            <p class="title"><?php the_title(); ?><p>
                            <p class="tag"><span><?php the_tags('#', '&nbsp;', ''); ?></span></p>
                        </div>
                    </a>
    </div>

    <?php
    }
    }
    else {
    echo '<p class="relate-state">暂无相关文章</p>';
    }
    wp_reset_query(); 
    }
    else {
    echo '<p class="relate-state">暂无相关文章</p>';
    }
    ?>
    </div> 

    
    
<!--        评论区域-->
    
    <?php comments_template(); ?>

</div>

<?php get_footer(); ?>