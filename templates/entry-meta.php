<div class="entry-meta">
    <div class="entry-date"><?php echo get_the_date(get_option('date_format')); ?></div>
    <div class="entry-author">
        <p>
            <?php global $post; echo get_avatar($post->post_author, 54, '', esc_attr__( 'Avatar', 'prosvit' ), array('class'=>'img-responsive image-small center-block')); ?>
        </p>
        <h6><a href="<?= get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author"><?= get_the_author(); ?></a></h6>
        <span class="entry-comments"><?php comments_number(esc_html__('No comment', 'tana'), esc_html__('1 comment', 'tana'), esc_html__('% comments','tana')); ?></span>
    </div>

    <div class="entry-social">
        <?php echo prosvit_get_share_links(); ?>
    </div>
</div>
<!-- .entry-details -->

