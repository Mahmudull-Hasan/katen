<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Katen
 */

get_header();
?>

	<!-- section main content -->
	<section class="main-content mt-3">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

					<?php
						while ( have_posts() ) :
							the_post();
					?>
					    <div class="post post-single">
						<!-- post header -->
							<div class="post-header">
								<h1 class="title mt-0 mb-3"><?php the_title();?></h1>
								<ul class="meta list-inline mb-0">
								<?php
									global $post;
									$author_id = $post->post_author;
								?>
									<li class="list-inline-item"><a href=<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID")));?>"><img src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" class="author" alt="author"/><?php the_author();?></a></li>
									<li class="list-inline-item"><a href="#">Trending</a></li>
									<li class="list-inline-item"><?php the_date();?></li>
								</ul>
							</div>
							<!-- featured image -->
							<div class="featured-image">
								<img src="<?php the_post_thumbnail_url();?>" alt="post-title" />
							</div>
							<!-- post content -->
							<div class="post-content clearfix">
								<p><?php the_content();?></p>

							</div>
							<!-- post bottom section -->
							<div class="post-bottom">
								<div class="row d-flex align-items-center">
									<div class="col-md-6 col-12 text-center text-md-start">
										<!-- tags -->
										<?php 
											$tags = get_tags();
											foreach ($tags as $tag) {
										?>
											<a href="<?php echo esc_url(get_tag_link($tag->term_id));?>" class="tag"><?php echo $tag->name;?></a>
										<?php
											}
										?>
									</div>
									<div class="col-md-6 col-12">
										<!-- social icons -->
										<ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
											<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
											<li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
										</ul>
									</div>
								</div>
							</div>

                    	</div>

					<?php
						// the_post_navigation(
						// 	array(
						// 		'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Previous:', 'katen' ) . '</span> <span class="nav-title">%title</span>',
						// 		'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Next:', 'katen' ) . '</span> <span class="nav-title">%title</span>',
						// 	)
						// );
					?>
						<div class="spacer" data-height="50"></div>

						<div class="about-author padding-30 rounded">
							<div class="thumb">
								<?php
									$user = wp_get_current_user();

									if ( $user ) {
								?>
									<img src="<?php echo esc_url( get_avatar_url( $user->ID ), 96 ); ?>" alt="author img" />
								<?php
									}
								?>
								
							</div>
							<div class="details">
								<h4 class="name"><a href="#"><?php get_the_author_meta('display_name');?></a></h4>
								<p><?php echo get_the_author_meta('description');?></p>
								<!-- social icons -->
								<ul class="social-icons list-unstyled list-inline mb-0">
									<?php 
										$author_socials = get_field('author_socials', 'user_'. get_the_author_meta('ID'));
										foreach ($author_socials as $social) {
									?>
										<li class="list-inline-item"><a href="<?php echo $social['url'];?>"><i class="<?php echo $social['icon'];?>"></i></a></li>
									<?php
										}
									?>
								</ul>
							</div>
						</div>

						<div class="spacer" data-height="50"></div>
					<?php

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

					

					
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


<?php
get_footer();
?>







	