<?php
/**
 *  Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Fashion Estore
 */
$fashion_estore_single_post_thumb =  get_theme_mod( 'fashion_estore_single_post_thumb', 1 );
$fashion_estore_single_post_title = get_theme_mod( 'fashion_estore_single_post_title', 1 ); 
$fashion_estore_single_post_meta =  get_theme_mod( 'fashion_estore_single_post_meta', 1 );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php if( $fashion_estore_single_post_title == 1 ) {?>
            <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <?php }?>

        <?php if( $fashion_estore_single_post_thumb == 1 ) {?>
            <?php if(has_post_thumbnail()) {?>
                <hr>
                    <?php the_post_thumbnail(); ?>
                <hr>
            <?php }?>
        <?php }?>
        <?php if( $fashion_estore_single_post_meta == 1 ) {?>
            <?php if ('post' === get_post_type()) :?>
                <div class="entry-meta">
                    <?php
                    fashion_estore_posted_on();
                    ?>
                </div>
            <?php endif; ?>
        <?php }?>
    </header>
    <div class="entry-content">
        <?php
        the_content(sprintf(
            wp_kses(
            /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'fashion-estore'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
            esc_html( get_the_title() )
        ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'fashion-estore'),
            'after' => '</div>',
        ));
        ?>
    </div>
    <footer class="entry-footer">
        <?php fashion_estore_entry_footer(); ?>
    </footer>
</article>