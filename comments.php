<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
?>



<div class="comments">
    
    <h1 class="comments-head"><i class="fa fa-commenting-o"></i> 评论 (<?php comments_popup_link('0', '1', '%', '', '评论已关闭'); ?>)</h1>
    
<?php 

    if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) { 
        // if there's a password
        // and it doesn't match the cookie
    ?>
    <div class="state">
        <p>请输入密码再查看评论内容</p>
    </div>
    <?php 
        } else if ( !comments_open() ) {
    ?>
    <div class="state">
        <p>已关闭评论</p>
        <?php wp_list_comments('type=comment&callback=calmface_comment'); ?>
    </div>
    <?php 
        } else if ( !have_comments() ) { 
    ?>
    <div class="state">
        <p>还没有任何评论</p>
    </div>
    <?php 
        } 
    
    else {
            wp_list_comments('type=comment&callback=calmface_comment');
        }

?>
    
</div>

<!--我的评论-->
<div class="my-comments">
        
<?php 
    if ( !comments_open() ) :
    // If registration required and not logged in.
    elseif ( get_option('comment_registration') && !is_user_logged_in() ) : 
?>
    
    <p class="state-c">你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论.</p>
    
<?php else  : ?>
    
    <!-- Comment Form -->
    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
        <p class="my-comments-title">发表评论 Leave a comment :</p>
        <textarea class="my-comments-content" name="comment" placeholder="请输入评论内容 Say something"></textarea>
        
<?php if ( !is_user_logged_in() ) : ?>
        
        <input class="name" name="author" type="text" placeholder="昵称 Name" value="<?php echo $comment_author; ?>" size="23">
        <input class="email" name="email" type="text" placeholder="邮箱 E-mail" value="<?php echo $comment_author_email; ?>" size="23">
        <input class="website" name="website" type="text" placeholder="网站 Website (可选)" value="<?php echo $comment_author_url; ?>" size="23">
        
<?php else : ?>
        
        <p class="state-c">
            <?php
                if (function_exists('get_avatar') && get_option('show_avatars')) { 
                    echo get_avatar($comment, 24);
                }
            ?>
            <?php
            echo $user_identity;
            ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">注销</a>
        </p>
        
<?php endif; ?>

        

        <a onClick="<?php echo $id; ?>" class="button medium black right"><input class="ok" type="submit" value="贴上！"></a>

<?php comment_id_fields(); ?>
<?php do_action('comment_form', $post->ID); ?>
        
    </form>

<?php endif; ?>
    
</div>






 









