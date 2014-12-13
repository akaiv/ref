<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <title><?php akaiv_title(); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo( 'name' ); ?> &mdash; 피드" href="<?php echo esc_url( get_feed_link() ); ?>">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<a class="skip-link sr-only" href="#content"><?php echo 'Skip to content'; ?></a>

<header id="masthead" class="site-header" role="banner">
  <?php $mobile  = array( 'title_li' => '', 'depth' => 1 ); ?>
  <?php $desktop = array( 'title_li' => '', 'depth' => 2, 'show_count' => 1 ); ?>
  <nav id="gnb" class="site-navigation gnb gnb-mobile navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#gnb-collapse">
          <span class="sr-only">메뉴 토글</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a id="brand" class="site-title navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      </div>
      <?php if ( current_user_can( 'publish_posts' ) ) : ?>
        <p class="navbar-text"><a class="navbar-link" href="<?php echo admin_url( 'post-new.php' ) ?>" target="_blank"><i class="fa fa-fw fa-plus text-light"></i> 새 자료 등록</a></p>
      <?php endif; ?>
      <div class="collapse navbar-collapse navbar-right" id="gnb-collapse">
        <ul class="nav navbar-nav"><?php wp_list_categories( $mobile ); ?></ul>
      </div>
    </div>
  </nav>
  <?php if ( ! is_singular() ) : ?>
    <nav class="site-navigation gnb gnb-desktop" role="navigation">
      <div class="container">
        <div class="well">
          <?php if ( get_bloginfo( 'description' ) ) : ?><p class="site-description"><i class="fa fa-fw fa-bookmark-o"></i><?php bloginfo( 'description' ); ?></p><?php endif; ?>
          <ul class="cat-list list-unstyled hidden-xs"><?php wp_list_categories( $desktop ); ?></ul>
        </div>
      </div>
    </nav>
  <?php endif; ?>
</header><!-- .site-header -->

<main id="main" class="site-main" role="main">
  <div class="container">
