<?php // Template single.php - utilise les fonctions natives WordPress ?>
<?php get_header(); ?>
<main class="site-content">
    <div class="container box">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <h1><?php echo esc_html(get_the_title()); ?></h1>
                <div><?php the_content(); ?></div>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?> 