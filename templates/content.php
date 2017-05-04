<article <?php post_class(); ?>>
  <header>
      <?php if ( '' !== get_the_post_thumbnail() ) : ?>
          <div class="post-thumbnail">
              <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail( 'post-thumb',  array( 'class' => 'img-responsive' ) ); ?>
              </a>
          </div><!-- .post-thumbnail -->
      <?php endif; ?>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <div class="post-content">
      <?php get_template_part('templates/entry-meta'); ?>
      <div class="entry-summary">
          <?php the_excerpt(); ?>
      </div>
  </div>

</article>
