<?php get_header(); ?>
<main class="site-content">
    <div class="container box">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <h2><?php the_title(); ?></h2>
            <div><?php the_content(); ?></div>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?>
