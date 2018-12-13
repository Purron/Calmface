<?php get_header(); ?>
<?php include 'intro.php';?>
        
<div class="wrap">
    <div class="content-index">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="content-item" id=”post-<?php the_ID(); ?> >
            <a href="<?php the_permalink(); ?>">
                <?php if ( has_post_thumbnail() ) : ?>
                    <img src="<?php the_post_thumbnail_url( array(398, 264) ); ?>">
                <?php endif ?>

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

        <?php endwhile; ?>
        <?php else : ?>

            <p>没有找到任何文章！</p>

        <?php endif; ?>
    </div>

    <!--翻页-->

    <div class="page">
        <p class="newer"><?php previous_posts_link('NEW', 0); ?></p>
        <p class="older"><?php next_posts_link('OLD', 0); ?></p>
    </div>

</div>

<div class="bottombar">
    
    <div class="hello">
        <p>I’ll graduate in july 2019, if you are interested in me, you can contact me or <a href="">download my resume.</a></p>
    </div>
    
    <div class="social-contact">
        
        <a class="social-contact-item" href="https://www.behance.net/purron" target="_blank">
            <i class="fa fa-behance"></i>
        </a>

        <a class="social-contact-item" href="http://weibo.com/purron" target="_blank">
            <i class="fa fa-weibo"></i>
        </a>
        
        <p class="social-contact-item weixin-item" href="#" target="_blank">
            <i class="fa fa-weixin"></i>
            <span class="weixin-account">PURRON</span>
        </p>
        
    </div>
</div>
            



        <?php get_footer(); ?>