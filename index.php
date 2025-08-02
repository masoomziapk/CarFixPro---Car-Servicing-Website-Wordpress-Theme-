<!-- <?php get_header(); ?>

<main class="site-main container">
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('template-parts/content', get_post_format());
        endwhile;
    else :
        echo '<p>No content available.</p>';
    endif;
    ?>
</main>

<?php get_footer(); ?> -->

<?php get_header(); ?>

<main id="site-main" class="site-main">
    <?php if ( have_posts() ) : ?>
        <section class="post-list">
            <?php while ( have_posts() ) : the_post(); ?>
                <article <?php post_class(); ?>>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="entry-meta">
                        <span class="posted-on"><?php echo get_the_date(); ?></span>
                        <span class="byline"> by <?php the_author(); ?></span>
                    </div>
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                    <a class="read-more" href="<?php the_permalink(); ?>">Read More</a>
                </article>
            <?php endwhile; ?>
        </section>

        <div class="pagination">
            <?php the_posts_pagination(); ?>
        </div>

    <?php else : ?>
        <section class="no-posts">
            <h2>No posts found</h2>
            <p>It looks like we can't find any posts here yet.</p>
        </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
