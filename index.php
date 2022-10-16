<?php 
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Katen
 */

 /*
	Template Name: Home Page
*/
get_header();?>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

                    <div class="row gy-4">                       
                        <?php 
                            while(have_posts()){
                                the_post();
                                get_template_part('template-parts/post-formats/post', get_post_format());
                            }
                        ?>
                    </div>

					<nav>
						<ul class="pagination justify-content-center">
							<?php katen_pagination();?>
						</ul>
					</nav>

				</div>
				<div class="col-lg-4">
					<!-- sidebar -->                 
					<div class="sidebar">
                        <?php 
                            get_sidebar();
                        ?>
					</div>
                    <!-- sidebar end -->
				</div>

			</div>

		</div>
	</section>
<?php get_footer();?>
</body>

</html>