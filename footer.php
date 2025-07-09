<?php // Placez votre logo dans assets/images/logo.png ?>
<footer class="site-footer">
    <div class="container">
        <div class="footer-column footer-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')) . ' - logo du site'; ?>">
            </a>
        </div>
        <div class="footer-column footer-nav">
            <h3>navigation</h3>
            <?php wp_nav_menu(['theme_location' => 'footer_menu', 'container' => false, 'menu_class' => 'footer-menu', 'menu_id' => 'footer-menu', 'aria_label' => __('Menu de pied de page', 'thyme')]); ?>
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
            <form action="#" method="post" aria-label="Formulaire d'inscription à la newsletter">
                <?php wp_nonce_field('thyme_newsletter', 'thyme_newsletter_nonce'); ?>
                <input type="email" name="thyme_newsletter_email" placeholder="Votre email" required aria-label="Votre adresse email">
                <button type="submit">S'inscrire</button>
                <?php if ($msg = get_transient('thyme_newsletter_message')) : ?>
                    <p class="newsletter-message"><?php echo esc_html($msg); ?></p>
                    <?php delete_transient('thyme_newsletter_message'); ?>
                <?php endif; ?>
            </form>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
