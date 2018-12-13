<?php

// 自定义添加介绍和标语

class calmface_customize {

	public static function calmface_register ( $wp_customize ) {
        
        $wp_customize->add_section( 'calmface_options', array(
			'title' 		=> __( '自我介绍和标语', 'calmface' ),
			'priority' 		=> 35,
			'capability' 	=> 'edit_theme_options',
			'description' 	=> __( ' ', 'calmface' ),
		) );
        
        
        $wp_customize->add_setting( 'calmface_home_self', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'calmface_home_self', array(
			'type' 			=> 'text',
			'section' 		=> 'calmface_options', // Add a default or your own section
			'label' 		=> __( '自我介绍', 'calmface' ),
			'description' 	=> __( '用一句简短的话介绍自己', 'calmface' ),
		) );
        
// Set the home page title
		$wp_customize->add_setting( 'calmface_home_title', array(
			'capability' 		=> 'edit_theme_options',
			'sanitize_callback' => 'sanitize_textarea_field',
			'transport'			=> 'postMessage'
		) );

		$wp_customize->add_control( 'calmface_home_title', array(
			'type' 			=> 'textarea',
			'section' 		=> 'calmface_options', // Add a default or your own section
			'label' 		=> __( '为你的站点设置标语', 'calmface' ),
			'description' 	=> __( '标语是一段显示在首页上方区域的文字，在首页设置中开启“你最近的文章”时会在首页显示该标语。', 'calmface' ),
		) );
    }
} 

add_action( 'customize_register', array( 'calmface_customize', 'calmface_register' ) );

// 自定义添加介绍和标语 over


// 自定义设置LOGO

add_theme_support( 'custom-logo' );
add_theme_support( 'custom-logo', array(
	'height'      => 56,
	'width'       => 56,
	'flex-height' => true,
	'flex-width'  => true,
	'header-text' => array( 'site-title', 'site-description' ),
) ); // 自定义设置LOGO over


// 设置特色图片
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

// 设置默认分辨率
    set_post_thumbnail_size( 600, 400, array( 'center', 'center') );
// 设置特色图片 over



// 评论内容

function calmface_comment($comment, $args, $depth) 
{
   $GLOBALS['comments'] = $comment; ?>
       
<div class="parent">
    <div class="comments-content">

        <div class="user">
            <div class="gravatar"><?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 40); } ?></div>
            <p class="user-name"><?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?></p>
            <p class="c-time"><?php echo get_comment_time('Y-m-d H:i'); ?></p>
            <?php edit_comment_link('修改'); ?>
            <?php if ( ($depth < 5)&&( comments_open() ) ): ?>
            <?php comment_reply_link(array_merge( $args, array('reply_text' => '回复','depth' => $depth, 'max_depth' => $args['max_depth']))) ?>

        
        <?php else : ?>
        <?php endif; ?>
        </div>

        <p>
            <?php if ($comment->comment_approved == '0') : ?>
                <em>你的评论正在审核，稍后会显示出来！</em><br />
             <?php endif; ?>
            
             <?php comment_text(); ?>
        </p>
        
        

    </div>
</div>

       
<?php } 

register_nav_menus();

?>
