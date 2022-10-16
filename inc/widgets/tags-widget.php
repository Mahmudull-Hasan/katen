<?php

//Started Post Tags Widget

class katen_post_tag_widget extends WP_Widget {
 
    // The construct part
    function __construct() {
        parent::__construct(
 
        // Base ID of your widget
        'katen_post_tag_widget', 
            
        // Widget name will appear in UI
        __('Katen Post Tag Widget', 'katen'), 
            
        // Widget description
        array( 'description' => __( 'Katen Post Tag For Blog Page', 'katen' ), )
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
    <!-- Tags Start -->

    
            <div class="widget-header text-center">
                <img src="<?php echo get_template_directory_uri();?>/assets/images/wave.svg" class="wave" alt="wave" />
            </div>
            <div class="widget-content">
            <?php 
                $tags = get_tags();
                foreach ($tags as $tag) {
            ?>
                <a href="<?php echo esc_url(get_tag_link($tag->term_id));?>" class="tag"><?php echo $tag->name;?></a>
            <?php
                }
            ?>
            </div>		
						
     <!-- Tags End -->
        <?php
            
            echo $args['after_widget'];
    }
     
    // Creating widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
            }
            else {
            $title = __( 'Tag Cloud', 'started' );
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

function katen_post_tag_load_widget() {
    register_widget( 'katen_post_tag_widget' );
}
add_action( 'widgets_init', 'katen_post_tag_load_widget' );