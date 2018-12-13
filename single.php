<!--        头部导航-->

<?php get_header(); ?>
<?php include 'topbar.php';?>
        
<!--        特色图片-->

<?php if ( has_post_thumbnail() ) : ?>
<div class="h-pic" id="h-pic">
    <img src="<?php the_post_thumbnail_url('full'); ?>" >
</div>
<?php endif; ?>
        
<!--        画布区域-->
        
<div class="wrap">

<!--        文章区域-->
    
<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>

<div class="article">
    <div class="article-head">
        <div class="category"><?php the_category(); ?>
            <p class="time"><?php the_time('y/m/j') ?></p>
        </div>
        <h1 class="title"><?php the_title(); ?></h1>
        <?php the_tags('<ul class="article-tagul"><li>','</li><li>','</li></ul>'); ?>
    </div>
<?php else : ?>

    <h1>没有文章！</h1>

<?php endif; ?>

<!--        文章内容-->
    <div class="article-content">
        <?php the_content(); ?>
    </div>

</div>

    <div class="article-end-img">
        <img src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
echo $image[0]; ?>"/>
    </div>
<!--        相关文章-->
    
    
<div class="content-index">
    <h1 class="relate-post"><i class="fa fa-newspaper-o"></i> 相关文章</h1>

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

    <div class="content-item" id=”post-<?php the_ID(); ?> style="background:url(<?php the_post_thumbnail_url( array(398, 264) ); ?>) no-repeat center center;background-size: cover; background-color:#f3f3f3;">

                    <a href="<?php the_permalink(); ?>">
                        <div class="overlay-content">
                            <p class="category"><?php  
                                foreach((get_the_category()) as $category)  
                                {  
                                echo $category->cat_name;  
                                }  
                                ?>  </p>
                            <p class="title"><?php the_title(); ?><p>
                            <?php the_tags('<ul class="tagul"><li>','</li><li>','</li></ul>'); ?>
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