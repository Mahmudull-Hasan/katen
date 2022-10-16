<?php 
/*
	Template Name: About Page
*/


get_header();?>

    <!-- page header -->
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2"><?php the_title();?></h1>
            </div>
        </div>
    </section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

                    <div class="page-content bordered rounded padding-30">
                        <?php
                            $about_image = get_field('about_image', 'options');
                            $about_name = get_field('about_name', 'options');
                            $about_description = get_field('about_description', 'options');
                            $about_socials = get_field('about_socials', 'options');
                        ?>

                        <img src="<?php echo $about_image;?>" alt="Katen Doe" class="rounded mb-4" />

                        <h3><?php echo $about_name;?></h3>

                        <p><?php echo $about_description;?></p>

                        <hr class="my-4" />
                        <ul class="social-icons list-unstyled list-inline mb-0">
                            <?php 
                                foreach ($about_socials as $social) {
                            ?>
                                <li class="list-inline-item"><a href="<?php echo $social['icon_url'];?>"><i class="<?php echo $social['social_icon'];?>"></i></a></li>
                            <?php
                                }
                            ?>
                        </ul>
                        
                    </div>

                </div>

				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<?php 
                            get_sidebar();
                        ?>

					</div>

				</div>

			</div>

		</div>
	</section>


<?php get_footer();?>