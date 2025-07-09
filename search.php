<?php // Template search.php - utilise les fonctions natives WordPress ?>
<?php get_header(); ?>
<main class="site-content">
    <div class="container">
        <h2>search results for : <?php echo esc_html(get_search_query()); ?></h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="box">
                <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
                <p><?php echo esc_html(get_the_excerpt()); ?></p>
            </article>
        <?php endwhile; else : ?>
            <p>nothing found</p>
        <?php endif; ?>
    </div>
</main>
<?php get_footer(); ?> 