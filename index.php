<?php
get_header();
akaiv_before_content(); ?>

<div class="site-search">
  <?php get_search_form(); ?>
</div>

<?php
  if ( have_posts() ) :
    if ( is_archive() ) :
      echo '<h1 class="archive-title">'.akaiv_get_the_archive_title().'</h1>';
    endif; ?>
    <div class="archive-list">
    <?php
      while ( have_posts() ) : the_post();
        echo '<div class="archive-item column">';
          get_template_part( 'templates/content' );
        echo '</div>';
      endwhile;
    ?>
    </div><!-- .masonry --><?php
    akaiv_paginate_links();
  else :
    get_template_part( 'templates/content', 'none' );
  endif;
?>

<?php
akaiv_after_content();
get_footer();
