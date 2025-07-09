<?php // FontAwesome est chargé via functions.php pour les icônes. ?>
<?php get_header(); ?>

<main class="site-content">
    <div class="container">

        <!-- Hero Section -->
        <section class="hero box" aria-label="home section">
            <h1>welcome on thyme</h1>
            <p>a high-performance & security seo-friendly minimalist wordpress theme for nerds</p>
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn">see posts</a>
        </section>

        <!-- Highlights Section -->
        <section class="highlights" aria-label="Why use thyme">
            <h2>y use thyme</h2>
            <div class="highlights-container">
                <div class="highlight box">
                    <i class="fas fa-chart-line" aria-hidden="true"></i>
                    <h4>seo-friendly</h4>
                    <p>optimized for search engines to rank higher effortlessly.</p>
                </div>
                <div class="highlight box">
                    <i class="fas fa-tachometer-alt" aria-hidden="true"></i>
                    <h4>high-performance</h4>
                    <p>fast-loading and lightweight, keeping your website blazing fast.</p>
                </div>
                <div class="highlight box">
                    <i class="fas fa-shield-alt" aria-hidden="true"></i>
                    <h4>high security</h4>
                    <p>built with security in mind, keeping vulnerabilities minimal.</p>
                </div>
                <div class="highlight box">
                    <i class="fas fa-cube" aria-hidden="true"></i>
                    <h4>minimalist</h4>
                    <p>clean and simple design, removing all unnecessary clutter.</p>
                </div>
            </div>
        </section>

        <!-- 3 Boxes Section -->
        <section class="theme-features" aria-label="theme features">
            <div class="feature box">
                <h3>lightweight & fast</h3>
                <p>thyme is optimized to ensure lightning-fast load times, giving you the edge in SEO and user experience.</p>
            </div>
            <div class="feature box">
                <h3>fully customizable</h3>
                <p>from typography to layout, every detail can be tweaked without touching a single line of code.</p>
            </div>
            <div class="feature box">
                <h3>no bloatware</h3>
                <p>only the necessary features are included—no extra scripts, no unnecessary plugins, just efficiency.</p>
            </div>
        </section>

        <!-- Latest Posts -->
        <section class="latest-posts">
            <h2>last posts</h2>
            <?php
            $query = new WP_Query(['posts_per_page' => 3]);
            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                <article class="box">
                    <h3><a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h3>
                    <p><?php echo esc_html(get_the_excerpt()); ?></p>
                </article>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </section>

        <!-- FAQ Section -->
        <section class="faq">
            <h2>frequently asked questions</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">why is this theme so great?</button>
                    <div class="faq-answer">
                        <p>because it has been designed to be highly customizable, efficient, and free of unnecessary elements that slow down seo and weaken security.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">is this theme compatible with major plugins?</button>
                    <div class="faq-answer">
                        <p>yes, thyme works seamlessly with popular plugins like elementor, woocommerce, and yoast seo.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">does this theme require coding knowledge?</button>
                    <div class="faq-answer">
                        <p>yes. everything can be customised easily if you know some code.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">how secure is this theme?</button>
                    <div class="faq-answer">
                        <p>thyme follows strict security best practices and avoids bloated code, making it safer than most themes.</p>
                    </div>
                </div>
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>

