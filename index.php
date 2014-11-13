<?php
get_header();
akaiv_before_content(); ?>

<?php
  if ( have_posts() ) : ?>
    <div class="loading-indicator">Loading...</div>
    <div class="archive-list">
      <?php if ( current_user_can( 'publish_posts' ) ) : ?>
        <div class="archive-item column">
          <div class="panel panel-default panel-post-new">
            <a class="post-new text-center" href="<?php echo admin_url( 'post-new.php' ) ?>" target="_blank">
              <i class="fa fa-fw fa-plus-circle"></i><br>새 자료 등록
            </a>
          </div><!-- .panel -->
        </div><!-- .column -->
      <?php endif; ?>
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
