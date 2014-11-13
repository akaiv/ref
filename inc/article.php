<?php
/* 요약에서 auto p 제거 */
remove_filter( 'the_excerpt', 'wpautop' );

/* 피드 */
function akaiv_insert_footnote($content) {
  $content = '<p>'.$content.'</p>';
  if ( has_post_thumbnail() ) :
    $content = '<p>'.get_the_post_thumbnail(null, 'large').'</p>'.$content;
  endif;
  $content.= '<p>원문 바로가기: <a href="'.akaiv_get_url().'">'.akaiv_get_url().'</a></p>';
  return $content;
}
add_filter( 'the_excerpt_rss', 'akaiv_insert_footnote' );
