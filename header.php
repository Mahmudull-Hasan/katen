
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<?php wp_head();?>
</head>

<body <?php body_class();?> >
<?php wp_body_open(); ?>
<!-- preloader -->
<!-- <div id="preloader">
	<div class="book">
		<div class="inner">
			<div class="left"></div>
			<div class="middle"></div>
			<div class="right"></div>
		</div>
		<ul>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
</div> -->

<!-- site wrapper -->
<div class="site-wrapper">

	<div class="main-overlay"></div>

	<!-- header -->
	<header class="header-personal">
        <div class="container-xl header-top">
			<div class="row align-items-center">

				<div class="col-4 d-none d-md-block d-lg-block">
					<!-- social icons -->
					<ul class="social-icons list-unstyled list-inline mb-0">
						<?php
							$header_socials = get_field('header_socials', 'options');
							foreach($header_socials as $social){
						?>
							<li class="list-inline-item"><a href="<?php echo $social['icon_link'];?>"><i class="<?php echo $social['header_icon'];?>"></i></a></li>
						<?php
							}
						?>
					</ul>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12 text-center">
				<!-- site logo -->
					<?php 
						$header_logo = get_field('header_logo', 'options');
					?>
					<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $header_logo['url'];?>" alt="logo" /></a>
					<a href="<?php echo site_url();?>" class="d-block text-logo"><?php the_field('header_blogger_name', 'options');?><span class="dot">.</span></a>
					<span class="slogan d-block"><?php the_field('header_blogger_title', 'options');?></span>
				</div>

				<div class="col-md-4 col-sm-12 col-xs-12">
					<!-- header buttons -->
					<div class="header-buttons float-md-end mt-4 mt-md-0">
						<button class="search icon-button">
							<i class="icon-magnifier"></i>
						</button>
						<button class="burger-menu icon-button ms-2 float-end float-md-none">
							<span class="burger-icon"></span>
						</button>
					</div>
				</div>

			</div>
        </div>

		<nav class="navbar navbar-expand-lg">
			<div class="container-xl">
				
				<div class="collapse navbar-collapse justify-content-center centered-nav">
					<!-- menus -->
					<ul class="navbar-nav">
						<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary_menu',
									'menu_id'        => 'primary_menu',
								)
							);
						?>
						
					</ul>
				</div>

			</div>
		</nav>
	</header>
