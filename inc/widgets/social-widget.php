<?php

//Started Social Widget

class katen_social_widget extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'katen_social_widget', 
            
        // Widget name will appear in UI
        __('Katen Social Widget', 'katen'), 
            
        // Widget description
        array( 'description' => __( 'Social Widget For Blog Page', 'katen' ), )
        );
    }
     
    // Creating widget front-end
    public function widget( $args, $instance ) {
        $title = apply_filters( 'widget_title', $instance['title'] );
 
            // before and after widget arguments are defined by themes
            echo $args['before_widget'];
            if ( ! empty( $title ) )
            echo $args['before_title'] . $title . $args['after_title'];


            $widget_id = 'widget_'. $args['widget_id'];
            $about_background_image = get_field('about_background_image', $widget_id);
            $about_image = get_field('about_image', $widget_id);
            $about_description = get_field('about_description', $widget_id);
            $about_socials = get_field('about_socials', $widget_id);
            
            // This is where you run the code and display the output
        ?>
           <!-- Category Start -->
               
           
                <div class="widget-about data-bg-image text-center" data-bg-image="<?php echo $about_background_image['url'];?>">
                    <img class="about-img" src="<?php echo $about_image['url'];?>" alt="logo" class="mb-4" />
                    <p class="mb-4"><?php echo $about_description;?></p>
                    
                    <ul class="social-icons list-unstyled list-inline mb-0">
                        <?php 
                            foreach($about_socials as $social){
                        ?>
                            <li class="list-inline-item"><a href="<?php echo $social['url'];?>"><i class="<?php echo $social['icon'];?>"></i></a></li>
                        <?php
                            }
                        ?>
                    </ul>
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
            $title = __( 'Katen', 'katen' );
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

function katen_social_load_widget() {
    register_widget( 'katen_social_widget' );
}
add_action( 'widgets_init', 'katen_social_load_widget' );