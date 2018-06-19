<?php get_header(); ?>
        
        <div class="wrap">
            
            
            <!--介绍-->

            <div class="intro">
                <p class="self"><?php echo esc_html( get_theme_mod( 'calmface_home_self' ) ); ?></p>
                <p class="slogan"><?php echo esc_html( get_theme_mod( 'calmface_home_title' ) ); ?></p>
<!--
                I’m Purron - an UX Designer 👨‍🎨 from China 🇨🇳
                <p>Using English here for hiding, concealing, filtering…
    </p>
                <p>The rest of me, robbed from depression and social phobia, is good.
    </p>
                <p>Just write here about ux, thoughts 💡 and everything.
    </p>
                <p>Thank you. </p>
--> 
                
                <div class="divi"><hr /></div>
                
            </div>

            <!--内容-->

            <div class="content-index">
                
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                
                <div class="content-item" id=”post-<?php the_ID(); ?> style="background:url(<?php the_post_thumbnail_url( array(398, 264) ); ?>) no-repeat center center;background-size: cover; background-color:#f3f3f3;">
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