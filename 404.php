<?php // Template 404.php - utilise les fonctions natives WordPress ?>
<?php get_header(); ?>
<main class="site-content">
    <div class="container box">
        <h1>404 error</h1>
        <p>this page doesn't exist.</p>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">go back home</a>
    </div>
</main>
<?php get_footer(); ?> 