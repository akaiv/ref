<?php
/* 썸네일 */
function ref_post_thumbnail($size = null) {
  if ( $size == 'related' ) : ?>
    <a href="<?php the_permalink(); ?>"><?php
      if ( has_post_thumbnail() ) :
        akaiv_the_post_thumbnail_srcset( 'related-1x', 'related-2x' );
      else : ?>
        <span class="docs"><i class="fa fa-fw fa-file-text-o"></i></span><?php
      endif; ?>
    </a><?php

  else : ?>
    <div class="post-thumbnail"><?php
      if ( is_singular() ) : /* 글, 페이지, 첨부파일 */
        if ( has_post_thumbnail() ) :
          akaiv_the_post_thumbnail_srcset( 'single-1x', 'single-2x' );
        endif;

      else : /* 외부 */ ?>
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php
          if ( has_post_thumbnail() ) :
            akaiv_the_post_thumbnail_srcset( 'preview-1x', 'preview-2x' );
          else : ?>
            <div class="no-thumbnail bg-black text-light"><i class="fa fa-fw fa-file-text-o"></i> 문서</div><?php
          endif; ?>
        </a><?php

      endif; ?>
    </div><?php

  endif;
}
