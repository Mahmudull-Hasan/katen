<?php
/**
 * Template part for displaying audio post content in post.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Katen
 */

?>

<div class="col-sm-6">
    <!-- post -->
    <div class="post post-grid rounded bordered">
        <div class="thumb top-rounded">
            <?php
                $cats = get_categories();
                foreach ($cats as $cat) {
            ?>
                <a href="<?php echo esc_url(get_category_link($cat->term_id));?>" class="category-badge position-absolute"><?php echo $cat->name;?></a>
            <?php
                }
            ?>
            <span class="post-format">
                <i class="icon-earphones"></i>
            </span>
            <a href="<?php the_permalink( );?>">
                <div class="inner">
                    <img src="<?php the_post_thumbnail_url();?>" alt="post-title" />
                </div>
            </a>
        </div>
        <div class="details">
            <ul class="meta list-inline mb-0">

                <?php
                    global $post;
                    $author_id = $post->post_author;
				?>

                <li class="list-inline-item"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta("ID")));?>"><img src="<?php echo esc_url( get_avatar_url( $author_id ) ); ?>" class="author" alt="author"/><?php the_author();?></a></li>
                <li class="list-inline-item"><?php echo get_the_date();?></li>
            </ul>
            <h5 class="post-title mb-3 mt-3"><a href="<?php echo esc_url( the_permalink());?>"><?php the_title();?></a></h5>
            <p class="excerpt mb-0"><?php the_excerpt( );?></p>
        </div>
        <div class="post-bottom clearfix d-flex align-items-center">
            <div class="social-share me-auto">
                <button class="toggle-button icon-share"></button>
                <ul class="icons list-unstyled list-inline mb-0">


                    <li class="list-inline-item"><a href="https://www.facebook.com/sharer/sharer.php?u=<?= get_permalink(); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    
                    <li class="list-inline-item"><a href="https://www.twitter.com/share?url=<?= get_permalink(); ?>&text=<?= get_the_title(); ?>" target="_blank"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>

                    <li class="list-inline-item"><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?= get_permalink(); ?>" target="_blank"><i class="fab fa-linkedin-in" aria-hidden="true"></i></a></li>
                    
                    <!-- <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li> -->

                    <li class="list-inline-item"><a href="mailto:?subject=<?= get_the_title(); ?> - <?= site_url(); ?>&body=I found this post on <?= site_url(); ?> and thought it would interest you.%0D%0A%0D%0A<?= get_the_title(); ?>%0D%0A<?= get_permalink(); ?>" target="_blank"><i class="far fa-envelope" aria-hidden="true"></i></i></li>
                </ul>
            </div>
            <div class="more-button float-end">
                <a href="<?php the_permalink();?>"><span class="icon-options"></span></a>
            </div>
        </div>
    </div>
</div>