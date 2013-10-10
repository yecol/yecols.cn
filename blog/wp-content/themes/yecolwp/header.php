<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<!--COMMON HEADER-->
<!DOCTYPE html>
<html lang="zh-cn">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" user-scalable="no">
		<title>Yecols.cn</title>
		<link type="text/css" rel="stylesheet" href="/assets/css/style.css">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<?php wp_head(); ?>
	</head>
	<body <?php if (is_home()) : ?> class="blog-home" <?php endif ?>>
		<nav class="site-nav" tabindex="-1">
			<button class="site-nav-logo" data-action="open-nav"><span class="reader-text">HOME</span></button>
			<div class="nav-list-container">
				<ul class="nav-list">
					<li class="nav-list-item">
						<a href="#"><span class="reader-text">Navigation</span></a>
					</li>
					<li class="nav-list-item">
						<a href="/photos/">Photos</a>
					</li>
					<li class="nav-list-item">
						<a href="/blog/">Blog</a>
					</li>
					<li class="nav-list-item">
						<a href="/portfolio/">Portfolio</a>
					</li>
					<li class="nav-list-item">
						<a href="/lab/">Lab</a>
					</li>
					<li class="nav-list-item">
						<a href="/about/">About</a>
					</li>
				</ul>
			</div>
		</nav>
		<div id="page" class="hfeed site">
		<div id="main" class="wrapper">