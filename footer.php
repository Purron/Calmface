<!--尾部-->
        
        <div class="footer">
            <div class="footer-content">
                <div class="copyright">
                    <p>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.COM | Designed by Purron</p>
                </div>
                    
                <div class="record">
                    <p><?php echo get_option( 'zh_cn_l10n_icp_num' );?></p>
                </div>
            </div>
            
        </div>
        

        <?php wp_footer(); ?>

    </body>
    
</html>