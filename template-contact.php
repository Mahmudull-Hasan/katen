<?php 
/*
	Template Name: Contact Page
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

			<div class="row">
				<?php 
                    $contact_info = get_field('contact_info', 'options');
                    foreach ($contact_info as $info) {
                ?>
                    <div class="col-md-4">
                    <!-- contact info item -->
                        <div class="contact-item bordered rounded d-flex align-items-center">
                            <span class="icon <?php echo $info['icon'];?>"></span>
                            <div class="details">
                                <h3 class="mb-0 mt-0"><?php echo $info['title'];?></h3>
                                <p class="mb-0"><?php echo $info['text'];?></p>
                            </div>
                        </div>
                        <div class="spacer d-md-none d-lg-none" data-height="30"></div>
                    </div>
                <?php
                    }
                ?>

            </div>

            <div class="spacer" data-height="50"></div>

            <!-- section header -->
            <div class="section-header">
                <h3 class="section-title"><?php _e('Send Message', 'katen');?></h3>
            </div>

            <!-- Contact Form -->
            <form id="contact-form" class="contact-form" method="post">
                <?php 
                    if(get_field("contact_form_shortcode", "options")){
                        echo do_shortcode(get_field("contact_form_shortcode","options"));
                    }
                ?>

            </form>
            <!-- Contact Form end -->
		</div>
	</section>

	<?php get_footer();?>