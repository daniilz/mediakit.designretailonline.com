<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hdmk
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700' rel='stylesheet' type='text/css'>	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<?php wp_head(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-8011509-3', 'auto');
  ga('send', 'pageview');

</script>

<script type='text/javascript' src='/wp-content/themes/drmk/js/script.js'></script>

</head>

<body <?php body_class(); ?>>




<div id="page" class="site">
	<div id="network-container">
	     <nav>
	     	  <span style="color:#000;">design:retail Network</span>
	     	  <h5 class=""><span class="ir"><a href="javascript:void(0)" class="">Menu</a></span></h5>
	          <ul>
	               <li><a href="http://www.designretailonline.com/">design:retail</a></li>
	               <li><a href="http://www.designretailforum.com/">design:retail forum</a></li>
	               <li><a href="http://www.globalshop.org/">GlobalShop</a></li>
	               <li><a class="active" href="http://mediakit.designretailonline.com/">Media Kit</a></li>
	          </ul>
	     </nav>
	</div>
	<header id="masthead" class="site-header" role="banner">
		<div class="wrapper clearfix">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<div id="publication-of"><a href="http://www.globalshop.org/" target="_blank">&nbsp;</a></div>
				<?php

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
				<?php
				endif; ?>
		</div>		

		<nav id="site-navigation" class="main-navigation" role="navigation">
		    <div class="wrapper clearfix">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'hdmk' ); ?></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
			</div>
		</nav><!-- #site-navigation -->
		<div class="wrapper clearfix">
		<?php 
		if (!$post->post_parent){
			$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0");
		} else{
			if($post->ancestors) {
				$ancestors = end($post->ancestors);
				$children = wp_list_pages("title_li=&child_of=".$ancestors."&echo=0&sort_column=menu_order");
			}
		} 
		if ($children) {

		?>
			<nav class="sub-navigation">
				<ul class="secondary-menu"><?php echo $children; ?></ul>
				<?php 
				//the_field('pdf_link')  ."//";
					if(get_field('pdf_1_link') || get_field('pdf_link')) {
				?>	
					<div class="pdfs-container float-right">
						<?php 
						if(get_field('pdf_1_link')) {				
						?>	
					    <span class="pdf-link"><a href="<?=the_field('pdf_1_link');?>" target="_blank"><img src="/wp-content/themes/drmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_1_title');?></a></span>
					    <?php } elseif (get_field('pdf_link')) { ?>
					    <span class="pdf-link"><a href="<?=the_field('pdf_link');?>" target="_blank"><img src="/wp-content/themes/drmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_1_title');?></a></span>
						<?php 
						}
						if(get_field('pdf_2_title')) {				
						?>	    
					    <span class="pdf-link pdf-link-2"><a href="<?=the_field('pdf_2_link');?>" target="_blank"><img src="/wp-content/themes/drmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=the_field('pdf_2_title');?></a></span>
					    <?php
						}
						?>
					</div>
				<?php 
					} else if(get_field('current_pdf_title')) {
				?>
						<div class="pdfs-container float-right">
						         <span class="pdf-link"><a href="<?=get_field('current_pdf_link');?>" target="_blank"><img src="/wp-content/themes/drmk/images/PDFlogo.png" alt="pdf" class="PDF_LogoLink"><?=get_field('current_pdf_title');?></a></span>
						</div>
		      
				<?
					} 
				} 
				?>
			</nav>

		</div> 
	</header><!-- #masthead -->

	<div id="content" class="site-content wrapper clearfix">
