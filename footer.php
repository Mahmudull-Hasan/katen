<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Katen
 */

?>

		<!-- footer -->
		<footer>
		<div class="container-xl">
			<div class="footer-inner">
				<div class="row d-flex align-items-center gy-4">
					<!-- copyright text -->
					<div class="col-md-4 text-center" >
						<span class="copyright"><?php the_field('copyright_text', 'options');?></span>
					</div>

					<!-- social icons -->
					<div class="col-md-4 text-center">
						<ul class="social-icons list-unstyled list-inline mb-0">
							<?php
								$footer_socials = get_field('footer_socials', 'options');
								foreach($footer_socials as $social){
							?>
								<li class="list-inline-item"><a href="<?php echo $social['icon_url'];?>"><i class="<?php echo $social['social_icon'];?>"></i></a></li>
							<?php
								}
							?>
						</ul>
					</div>

					<!-- go to top button -->
					<div class="col-md-4">
						<a href="#" id="return-to-top" class="float-md-end"><i class="icon-arrow-up"></i>Back to Top</a>
					</div>
				</div>
			</div>
		</div>
	</footer>

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>
	<!-- content -->
	<div class="search-content">
		<div class="text-center">
			<h3 class="mb-4 mt-0">Press ESC to close</h3>
		</div>
		<!-- form -->
		<form class="d-flex search-form">
			<input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search" name="s">
			<button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
		</form>
	</div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
	<!-- close button -->
	<button type="button" class="btn-close" aria-label="Close"></button>

	<!-- logo -->
	<div class="logo">
		<?php 
			$header_logo = get_field('header_logo', 'options');
		?>
		<a href="<?php echo site_url();?>"><img src="<?php echo $header_logo['url'];?>" alt="Katen" /></a>
	</div>

	<!-- menu -->
	<nav>
		<ul class="vertical-menu">

			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary_menu',
						'menu_id'        => 'primary_menu',
					)
				);
			?>
			
		</ul>
	</nav>

	<!-- social icons -->
	<ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
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
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
