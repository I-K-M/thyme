<?php // Placez votre logo dans assets/images/logo.png ?>
<header class="site-header">
    <div class="container">
        <div class="header-logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')) . ' - logo du site'; ?>">
            </a>
        </div>
        <nav class="main-nav" aria-label="Menu principal">
            <?php wp_nav_menu(['theme_location' => 'main_menu', 'container' => false, 'menu_class' => 'main-menu', 'menu_id' => 'main-menu', 'aria_label' => __('Menu principal', 'thyme')]); ?>
        </nav>
        <div class="call-us">
            <a href="tel:000000" aria-label="Appeler le support">
                <i class="fas fa-phone-alt"></i> call us now
            </a>
        </div>
    </div>
</header>
