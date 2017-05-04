<?php while (have_posts()) : the_post(); ?>
<article <?php post_class(); ?>>
    <header>
        <?php if ( '' !== get_the_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'post-thumb',  array( 'class' => 'img-responsive' ) ); ?>
                </a>
            </div><!-- .post-thumbnail -->
        <?php endif; ?>
        <h1 class="post-title entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="post-content">
        <?php get_template_part('templates/entry-meta'); ?>
        <div class="entry-content">
            <?php the_content(); ?>
        </div>
    </div>

    <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
</article>
<?php endwhile; ?>
