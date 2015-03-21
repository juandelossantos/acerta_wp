<?php
/**
 *
 * Template para mostrar contenido.
 *
 */
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <?php
    // Post thumbnail.
    // twentyfifteen_post_thumbnail();
  ?>

  <div>
    <div class="entry">

    <?php
        if ( has_post_thumbnail() ) { // check if the post Thumbnail
            the_post_thumbnail(array(100,100));
        } else {
            //your default img
        }
?>
</div>
    <div>
    <?php
      if ( is_single() ) :
        the_title( '<h1 class="tit1">', '</h1>' );
      else :
        the_title( sprintf( '<h1 class="tit1"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' );
      endif;
    ?>
    </div><!-- .entry-header -->

  <div>
    <?php
      /* translators: %s: Name of current post */
      the_content( sprintf(
        __( 'Continue reading %s', 'acerta' ),
        the_title( '<span class="screen-reader-text">', '</span>', false )
      ) );

      wp_link_pages( array(
        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'acerta' ) . '</span>',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'acerta' ) . ' </span>%',
        'separator'   => '<span class="screen-reader-text">, </span>',
      ) );
    ?>
  </div><!-- .entry-content -->

  <?php
    // Author bio.
    if ( is_single() && get_the_author_meta( 'description' ) ) :
      get_template_part( 'author-bio' );
    endif;
  ?>

  

</div><!-- #post-## -->
</div>
