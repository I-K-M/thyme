<footer class="site-footer">
    <div class="container">
        <div class="footer-column footer-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <div class="footer-column footer-nav">
            <h3>navigation</h3>
            <?php wp_nav_menu(['theme_location' => 'footer_menu', 'container' => false]); ?>
        </div>
        <div class="footer-column useful-links">
            <h3>useful links</h3>
            <ul>
                <li><a href="#">privacy policy</a></li>
                <li><a href="#">terms & conditions</a></li>
            </ul>
        </div>
        <div class="footer-column newsletter">
            <h3>subscribe</h3>
            <form action="#" method="post">
                <input type="email" placeholder="your email id" required>
                <button type="submit">subscribe</button>
            </form>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
