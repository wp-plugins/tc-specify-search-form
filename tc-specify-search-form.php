<?php
/*
Plugin Name: TC Specify Search Form
Description: Creates a new Search Form widget that allows you to specify which searchform-*.php file you wish to use.
Version: 1.0
Author: Tracy Rotton
Author URI: http://www.taupecat.com/
*/

/* Widget for displaying custom search form */
add_action( 'widgets_init', 'tc_specify_search_form_register_widgets' );

function tc_specify_search_form_register_widgets() {
    register_widget( 'TC_Specify_Search_Form_Widget' );
}

class TC_Specify_Search_Form_Widget extends WP_Widget {

    // Process the widget
    function __construct() {

        $options = array(
            'classname'     => 'tc_specify_search_form widget_search',
            'description'   => __('Specify which searchform-*.php template you wish to display.', 'tc_specify_search_form')
        );

        parent::__construct( 'TC_Specify_Search_Form_Widget', __('TC Specify Search Form', 'tc_specify_search_form'), $options );
    }

    // Display the widget form in the admin dashboard
    function form( $instance ) {
        $defaults = array( 'template' => '' );
        $instance = wp_parse_args( (array) $instance, $defaults );

        // Widget options
        $title = $instance['title'];
        $count = $instance['template'];

        echo '<p>Title: <input class="widefat" name="'
            . $this->get_field_name( 'title' ) . '" id="'
            . $this->get_field_name( 'title' ) . '" value="'
            . esc_attr( $title ) . '"></p>';

        echo '<p>Template: <input class="widefat" name="'
            . $this->get_field_name( 'template' ) . '" id="'
            . $this->get_field_name( 'template' ) . '" value="'
            . esc_attr( $count ) . '"><br>'
            . '(searchform-<b>enter_this_portion_only</b>.php)</p>';
    }

    // Process widget options to save
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = strip_tags( (string) $new_instance['title'] );
        $instance['template'] = strip_tags( (string) $new_instance['template'] );

        return $instance;
    }

    // Displays the widget
    function widget( $args, $instance ) {
        extract( $args );

        echo $before_widget;

        $title = apply_filters( 'widget_title', $instance['title'] );

        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }

        get_template_part( 'searchform', $instance['template'] );

        echo $after_widget;
    }
}
