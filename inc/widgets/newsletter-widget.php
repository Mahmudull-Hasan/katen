<?php

//Started Social Widget

class katen_newsletter_widget extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'katen_newsletter_widget', 
            
        // Widget name will appear in UI
        __('Katen Newsletter Widget', 'katen'), 
            
        // Widget description
        array( 'description' => __( 'Newsletter Widget For Blog Page', 'katen' ), )
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
                <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                    <?php echo do_shortcode('[contact-form-7 id="43" title="Newsletter form"]');?>
                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
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
            $title = __( 'Newsletter', 'katen' );
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

function katen_newsletter_load_widget() {
    register_widget( 'katen_newsletter_widget' );
}
add_action( 'widgets_init', 'katen_newsletter_load_widget' );