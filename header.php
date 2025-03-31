<header class="site-header">
    <div class="container">
        <div class="header-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
            </a>
        </div>
        <nav class="main-nav">
            <?php wp_nav_menu(['theme_location' => 'main_menu', 'container' => false]); ?>
        </nav>
        <div class="call-us">
            <a href="tel:000000">
                <i class="fas fa-phone-alt"></i> call us now
            </a>
        </div>
    </div>
</header>
