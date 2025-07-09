<?php // Template archive.php - utilise les fonctions natives WordPress ?>
<?php get_header(); ?>
<main class="site-content">
    <div class="container">
        <h2><?php the_archive_title(); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="box">
                <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?> 