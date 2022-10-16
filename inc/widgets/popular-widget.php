<?php

//Started Social Widget

class katen_popular_posts_widget extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'katen_popular_posts_widget', 
            
        // Widget name will appear in UI
        __('Popular Posts Widget', 'katen'), 
            
        // Widget description
        array( 'description' => __( 'Popular Post Widget For Blog Page', 'katen' ), )
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
                <?php
                    $arg = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                    );
                    $query = new WP_Query($arg);
                    if($query->have_posts()){
                        while($query->have_posts()){
                        $query->the_post();
                        $category = get_categories();
                        $count = count($category);
                        
                ?>
                    <div class="post post-list-sm circle">
                        <div class="thumb circle">

                            <span class="number"><?php echo $count;?></span>
                            <a href="<?php the_permalink();?>">
                                <div class="inner">
                                    <img src="<?php the_post_thumbnail_url();?>" alt="post-title" />
                                </div>
                            </a>
                        </div>
                        <div class="details clearfix">
                            <h6 class="post-title my-0"><a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
                            <ul class="meta list-inline mt-1 mb-0">
                                <li class="list-inline-item"><?php echo get_the_date();?></li>
                            </ul>
                        </div>
                    </div>
                <?php
                        }
                        wp_reset_postdata();
                    }
                ?>
                    
                <!-- post -->
                

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

function popular_post_widget_load_widget() {
    register_widget( 'katen_popular_posts_widget' );
}
add_action( 'widgets_init', 'popular_post_widget_load_widget' );