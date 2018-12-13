<div class="intro">
    <a class="intro-logo" href="<?php bloginfo('url'); ?>/">
        <img src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                        echo $image[0]; ?>"/>
    </a>
    <p class="self"><?php echo esc_html( get_theme_mod( 'calmface_home_self' ) ); ?></p>
    <img class="intro-cover" src="http://files.calmface.com/intro-cover.jpg" />
    <p class="slogan"><?php echo esc_html( get_theme_mod( 'calmface_home_title' ) ); ?></p>
    <nav class="intro-nav">
        <?php wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) );?>
    </nav>
</div>