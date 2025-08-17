
	</main>
    <footer id="site-footer" class="bg-dark color-white">
        <div class="container d-flex justify-between">
            <div class="side-left">
                <?php echo '&copy; ' . date('Y') . ' ' . get_bloginfo('name') . ' ' . __('All rights reserved', 'cbtw'); ?>
            </div>
            <div class="side-right">
                <div class="footer-menu">
                    <?php wp_nav_menu([
                        'theme_location' => 'footer_menu',
                        'container' => false,
                        'menu_id' => 'footer-menu',
                        'menu_class' => 'list-menu',
                        
                    ]); ?>
                </div>
            </div>
        </div>
    </footer>
</div><!--#div-->

<?php wp_footer(); ?>

	</script>
</body>
</html>
