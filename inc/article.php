<?php
/* 요약에서 auto p 제거 */
remove_filter( 'the_excerpt', 'wpautop' );

/* 피드 */
function akaiv_insert_footnote($content) {
  if ( is_feed() || is_single() ) :
    $content = '<p>'.$content.'</p>';
    if ( is_feed() && has_post_thumbnail() ) :
      $content = '<p>'.get_the_post_thumbnail(null, 'large').'</p>'.$content;
    endif;
    $content.= '<p>원문 바로가기: <a href="'.akaiv_get_url().'">'.akaiv_get_url().'</a></p>';
  endif;
  return $content;
}
add_filter( 'the_excerpt', 'akaiv_insert_footnote' );
