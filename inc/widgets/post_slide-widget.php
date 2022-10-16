<?php

//Started Social Widget

class katen_celebration_posts_widget extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'katen_celebration_posts_widget', 
            
        // Widget name will appear in UI
        __('Celebration Slide Posts Widget', 'katen'), 
            
        // Widget description
        array( 'description' => __( 'Celebration Slide Post Widget For Blog Page', 'katen' ), )
        );
    }
     
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
 
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];
            
            // This is where you run the code and display the output
        ?>
           <!-- Category Start -->
               
           
           
            <div class="widget-header text-center">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
                <div class="post-carousel-widget">
                    <?php
                        $arg = array(
                            'post_type' => 'post',
                            'posts_per_page' => 6,
                        );
                        $query = new WP_Query($arg);
                        $cats = get_categories();
                        foreach ($cats as $cat) {

                        };

                        if($query->have_posts()){
                            while($query->have_posts()){
                            $query->the_post();
                            
                    ?>                   
                        <!-- post -->
                        <div class="post post-carousel">
                            <div class="thumb rounded">
                                <a href="<?php echo esc_url(get_category_link($cat->term_id ));?>" class="category-badge position-absolute"><?php echo $cat->name;?></a>
                                <a href="<?php the_permalink();?>">
                                    <div class="inner">
                                        <img src="<?php the_post_thumbnail_url();?>" alt="post-title" />
                                    </div>
                                </a>
                            </div>
                            <h5 class="post-title mb-0 mt-4"><a href="<?php the_permalink();?>"><?php the_title();?></a></h5>
                            <ul class="meta list-inline mt-2 mb-0">
                                <li class="list-inline-item"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></li>
                                <li class="list-inline-item"><?php echo get_the_date();?></li>
                            </ul>
                        </div>
                                                           
                    <?php
                            }
                            wp_reset_postdata();
                        }
                    ?>               
                </div>
            </div>

            <!-- carousel arrows -->
            <div class="slick-arrows-bot">
                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
            </div>
           
        
        <!-- Category End -->
        <?php
            
            echo $args['after_widget'];
    }
     
    // Creating widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'Popular Posts', 'katen' );
            }
            // Widget admin form
            ?>
            <p>
                <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
                <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
            </p>
            <?php
           
    }
     
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        return $instance;
    }
     
    // Class wpb_widget ends here
}

function celebration_post_widget_load_widget() {
    register_widget( 'katen_celebration_posts_widget' );
}
add_action( 'widgets_init', 'celebration_post_widget_load_widget' );