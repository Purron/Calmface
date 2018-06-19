<!DOCTYPE html>
<html>
    <head>
        
        <title><?php if ( is_home() ) {
		bloginfo('name'); echo " - "; bloginfo('description');
	} elseif ( is_category() ) {
		single_cat_title(); echo " - "; bloginfo('name');
	} elseif (is_single() || is_page() ) {
		single_post_title();
	} elseif (is_search() ) {
		echo "搜索结果"; echo " - "; bloginfo('name');
	} elseif (is_404() ) {
		echo '页面未找到';
	} else {
		wp_title('',true);
	} ?></title>
        
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport"  content="width=device-width,maximum-scale=1,minimum-scale=1,initial-scale=1,user-scalable=no">
        
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
        
        <?php wp_head(); ?>
        <?php flush(); ?>
        
    </head>
    
    
    
    <body>
        <div class="header">
            
            <div class="head-content">
                
                <a class="logo" href="<?php bloginfo('url'); ?>/">
                    <img src="<?php $custom_logo_id = get_theme_mod( 'custom_logo' );
$image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
echo $image[0]; ?>"/>
                    <span><?php bloginfo('name'); ?></span>
                </a>
                
                <nav class="nav">
                    <?php 

                    // 列出顶部导航菜单，菜单名称为mymenu，只列出一级菜单
                    
                        wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) );
                    ?>
                </nav>
                
            </div>
        </div>