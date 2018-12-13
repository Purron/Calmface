<div class="header">
    <div class="head-content">
        <a class="logo" href="<?php bloginfo('url'); ?>/">
            <img src="<?php
                      $custom_logo_id = get_theme_mod( 'custom_logo' );
                      $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                      echo $image[0]; 
                      ?>"/>
            <h1 class="blog-title"><?php bloginfo('name'); ?></h1>
        </a>
        
<!--    列出顶部导航菜单，菜单名称为mymenu，只列出一级菜单-->
        <nav class="nav">
            <?php wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) );?>
        </nav>
    </div>
</div>