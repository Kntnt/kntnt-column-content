<?php

/**
 * Plugin main file.
 * @wordpress-plugin
 * Plugin Name:       Kntnt's Column Content
 * Plugin URI:        https://www.kntnt.com/
 * GitHub Plugin URI: https://github.com/Kntnt/kntnt-column-content
 * Description:       Adds shortcodes to make columns.
 * Version:           1.0.0
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       kntnt-column-content
 * Domain Path:       /languages
 */

namespace Kntnt\Column_Content;

defined( 'WPINC' ) && new Plugin;

class Plugin {

    private static $row_defaults = [
        'class' => null,
        'id' => null,
        'style' => null,
        'padding' => '0',
        'gutter' => '1em',
    ];

    private static $column_defaults = [
        'width' => 'auto',
        'class' => null,
        'id' => null,
        'style' => null,
        'grow' => null,
    ];

    private $gutter;

    public function __construct() {
        add_shortcode( 'row', [ $this, 'row' ] );
        add_shortcode( 'column', [ $this, 'column' ] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_assets' ] );
    }

    public function row( $atts, $content, $tag ) {
        $atts = $this->shortcode_atts( self::$row_defaults, $atts );
        $this->gutter = $atts['gutter'];
        $content = new Content( $atts, $content, $tag );
        $content->add_class( 'kntnt-column-content-row' );
        $content->add_style( 'padding', $atts['padding'] );
        return $content->get_content();
    }

    public function column( $atts, $content, $tag ) {
        $atts = $this->shortcode_atts( self::$column_defaults, $atts );
        if ( null == $atts['grow'] ) {
            $atts['grow'] = 'auto' == $atts['width'] ? 1 : 0;
        }
        $content = new Content( $atts, $content, $tag );
        $content->add_class( 'kntnt-column-content-column' );
        $content->add_style( 'flex-basis', $atts['width'] );
        $content->add_style( 'flex-grow', $atts['grow'] );
        $content->add_style( 'padding-left', "calc( {$this->gutter} / 2 )" );
        $content->add_style( 'padding-right', "calc( {$this->gutter} / 2 )" );
        return $content->get_content();
    }

    public function enqueue_assets() {
        wp_enqueue_style( 'kntnt-column-content.css', plugins_url( '/css/kntnt-column-content.css', __FILE__ ), [] );
    }

    // A more forgiving version of WP's shortcode_atts().
    private function shortcode_atts( $pairs, $atts, $shortcode = '' ) {

        $atts = (array) $atts;
        $out = [];
        $pos = 0;
        while ( $name = key( $pairs ) ) {
            $default = array_shift( $pairs );
            if ( array_key_exists( $name, $atts ) ) {
                $out[ $name ] = $atts[ $name ];
            }
            else if ( array_key_exists( $pos, $atts ) && '' != $atts[ $pos ] ) {
                $out[ $name ] = $atts[ $pos ];
                ++ $pos;
            }
            else {
                $out[ $name ] = $default;
            }
        }

        if ( $shortcode ) {
            $out = apply_filters( "shortcode_atts_{$shortcode}", $out, $pairs, $atts, $shortcode );
        }

        return $out;

    }

}

class Content {

    private $tag;

    private $atts;

    private $content;

    public function __construct( $atts, $content, $tag ) {
        $this->atts = $atts;
        $this->content = $content;
        $this->tag = $tag;
    }

    public function add_class( $class ) {
        $this->add( $class, $this->atts['class'] );
    }

    public function add_style( $selector, $value ) {
        $this->add( "$selector:$value;", $this->atts['style'] );
    }

    public function get_content() {
        $content = do_shortcode( $this->content );
        extract( $this->atts );
        ob_start();
        include "includes/kntnt-column-content.php";
        return ob_get_clean();
    }

    private function add( $a, &$b ) {
        $b = $a . ( $b ? ' ' . $b : '' );
    }

}