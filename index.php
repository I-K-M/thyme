<?php get_header(); ?>
<main class="site-content">
    <div class="container">
        <h2>latest posts</h2>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="box">
                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p><?php the_excerpt(); ?></p>
            </article>
        <?php endwhile; endif; ?>
    </div>
</main>
<?php get_footer(); ?>
