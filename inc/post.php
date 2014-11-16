<?php
/* 페이지 시작 */
function akaiv_before_page() { ?>
  <article <?php post_class(); ?>><?php
}

/* 페이지 끝 */
function akaiv_after_page() { ?>
  </article><?php
}

/* 글: 제목 */
function akaiv_the_title() {
  $title = trim(get_the_title());
  if ( ! $title ) $title = '(제목이 없는 글)';
  echo $title;
}

/* 글: URL */
function akaiv_get_url() {
  $url = get_post_meta( get_the_ID(), 'wpcf-website-url', true );
  if ( ! $url ) $url = '#';
  return esc_url( $url );
}
function akaiv_the_url() {
  echo akaiv_get_url();
}

/* 글: 썸네일 */
function akaiv_post_thumbnail() {
  if ( $size == 'related' ) : ?>
    <a href="<?php the_permalink(); ?>"><?php
      if ( has_post_thumbnail() ) :
        the_post_thumbnail_srcset( 'related-1x', 'related-2x' );
      else : ?>
        <span class="docs"><i class="fa fa-fw fa-file-text-o"></i></span><?php
      endif; ?>
    </a><?php

  else : ?>
    <div class="post-thumbnail"><?php
      if ( is_singular() ) : /* 글, 페이지, 첨부파일 */
        if ( has_post_thumbnail() ) :
          the_post_thumbnail_srcset( 'single-1x', 'single-2x' );
        endif;

      else : /* 외부 */ ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
          if ( has_post_thumbnail() ) :
            the_post_thumbnail_srcset( 'preview-1x', 'preview-2x' );
          else : ?>
            <div class="no-thumbnail bg-black text-light"><i class="fa fa-fw fa-file-text-o"></i> 문서</div><?php
          endif; ?>
        </a><?php

      endif; ?>
    </div><?php

  endif;
}

/* 레티나 대응 썸네일 */
function the_post_thumbnail_srcset($size1x, $size2x) {
  $post_thumbnail_id = get_post_thumbnail_id( get_the_ID() );
  $image = wp_get_attachment_image_src( $post_thumbnail_id, $size2x );
  list($src, $width, $height) = $image;
  $attr = array( 'srcset' => $src.' 2x' );
  the_post_thumbnail($size1x, $attr);
}

/* 글: 메타 */
function akaiv_post_meta($str = null) {
  if ( ! $str ) :
    return;

  elseif ( $str == 'category' ) : ?>
    <span class="cat-links"><?php echo get_the_category_list( ', ' ); ?></span><?php

  elseif ( $str == 'tag' ) :
    if ( has_tag() ) : ?>
      <span class="tag-links"><?php the_tags('', ', ', ''); ?></span><?php
    endif;

  elseif ( $str == 'date' ) : ?>
    <span class="posted-on"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ) ?></time></span><?php

  elseif ( $str == 'author' ) : ?>
    <span class="author"><i class="fa fa-fw fa-user"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author"><?php echo get_the_author(); ?></a></span><?php

  endif;
}

/* 글: 편집 링크 */
function akaiv_edit_post_link() {
  if ( ! is_page() ) :
    edit_post_link( '편집', '<span class="edit-link">', '</span>' );
  else :
    edit_post_link( '편집', '<div class="text-right"><span class="edit-link">', '</span></div>' );
  endif;
}

/* 글: 내비게이션 버튼 */
function akaiv_post_nav() {
  // Don't print empty markup if there's nowhere to navigate.
  $previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
  $next     = get_adjacent_post( false, '', false );

  if ( ! $next && ! $previous ) return; ?>

  <nav class="navigation post-navigation" role="navigation">
    <h1 class="screen-reader-text"><?php echo 'Post navigation'; ?></h1>
    <div class="nav-links"><?php
      if ( is_attachment() ) : /* 첨부파일 페이지일 때 */ ?>
        <div class="published-in"><?php
          previous_post_link( '%link', '<i class="fa fa-fw fa-folder-open"></i> 발행 위치: ' . '%title' ); ?>
        </div><?php
      else : /* 첨부파일 페이지가 아닐 때 */
        previous_post_link( '%link', '<i class="fa fa-fw fa-angle-left"></i> 이전 글');
        next_post_link( '%link', '다음 글 <i class="fa fa-fw fa-angle-right"></i>' );
      endif; ?>
    </div>
  </nav><?php
}
