<?php akaiv_before_page(); ?>

<?php
  $theID   = get_the_ID();
  $starred = get_post_meta( $theID, 'wpcf-website-starred', true );
  $url     = get_post_meta( $theID, 'wpcf-website-url', true );
  $source  = get_post_meta( $theID, 'wpcf-website-source', true );
?>
<div class="panel panel-default">

  <div class="panel-heading">
    <?php akaiv_post_thumbnail(); ?>
    <?php if ( $starred ) echo '<i class="fa fa-fw fa-star star orange"></i>'; ?>
  </div><!-- .panel-heading -->

  <div class="panel-body">
    <header class="entry-header">
      <h1 class="entry-title">
        <a href="<?php akaiv_the_url(); ?>" target="_blank" rel="bookmark"><?php akaiv_the_title(); ?></a>
      </h1>
    </header>
    <div class="entry-summary">
      <p><?php the_excerpt(); ?></p>
    </div>
    <div class="entry-meta">
      <p class="text-right">
        <?php akaiv_edit_post_link(); ?><br>
        <?php akaiv_post_meta( 'date' ); ?>
      </p>
    </div>
  </div><!-- .panel-body -->

  <ul class="list-group entry-meta">
    <li class="list-group-item">
      <div class="meta-title"><i class="fa fa-fw fa-folder-open"></i> 분류</div>
      <div class="meta-content"><?php akaiv_post_meta( 'category' ); ?></div>
    </li>
    <?php if ( has_tag() ) : ?>
      <li class="list-group-item">
        <div class="meta-title"><i class="fa fa-fw fa-tags"></i> 태그</div>
        <div class="meta-content"><?php akaiv_post_meta( 'tag' ); ?></div>
      </li>
    <?php endif; ?>
    <?php if ( $source ) : ?>
      <li class="list-group-item url">
        <div class="meta-title"><i class="fa fa-fw fa-quote-left"></i> 출처</div>
        <div class="meta-content"><a href="<?php echo $source; ?>" target="_blank"><?php echo parse_url($source)['host']; ?></a></div>
      </li>
    <?php endif; ?>
  </ul>

</div><!-- .panel -->

<?php akaiv_after_page(); ?>
