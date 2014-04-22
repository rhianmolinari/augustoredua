<?php
/**
 * @package WordPress
 * @subpackage Augusto_Rédua
 * @since Augusto Rédua 1.0
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/less/bootstrap.less" type="text/less" />

  <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon">

<!-- SEO -->
<meta property="og:title" content="<?php wp_title( '|', true, 'right' ); ?> <?php bloginfo('name'); ?>" />
<meta property="og:locale" content="pt-BR" />

<!-- Meta Tags home -->
<?php $query = new WP_Query( 'pagename=sobre' );
while ( $query->have_posts() ) : $query->the_post(); ?>
<meta name="description" content="<?php echo get_the_content(); ?>" />
<?php endwhile; wp_reset_postdata(); ?>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="height:auto;">
	<header class="navbar" role="banner">
    <div class="container">
      <div class="row">
        <a class="navbar-brand col-xs-4 col-sm-3 col-md-2" href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><img class="img-responsive" src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>"></a>
        <span class="pull-right col-xs-2 col-sm-2 col-md-1 scroll"></span>
      </div>
    </div>
	</header>