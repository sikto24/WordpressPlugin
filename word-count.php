<?php
/*
 * Plugin Name:      Post Word Count
 * Plugin URI:        
 * Description:       Word Count for posts
 * Version:           1.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            SIkto
 * Author URI:       
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       word-count
 * Domain Path:       /languages
 */

// function wordCountActive()
// {
// }
// register_activation_hook(__FILE__, 'wordCountActive');


// function wordCountdeActive(){

// }
// register_deactivation_hook( __FILE__, 'wordCountdeActive' );

// function wordCountTextDomain(){
//     load_plugin_textdomain( 'word-count', false, dirname(__FILE__). "/languages" );
// }
// add_action( 'plugins_loaded', 'wordCountTextDomain' );


// function wordCountWords($content){
//     $stripped_content = strip_tags( $content );
//     $wordCount  = str_word_count($stripped_content);
//     $label = __('Total Number of Words' , 'word-count');
//     $tags = "h3";
//     $content .= sprintf("<%s>%s : %s</%>" , $tags ,$label , $wordCount  , $tags);
//     return $content;
// }
// add_filter('the_content', 'wordCountWords');

// ====================================

// Plugin Active
// function wordCountActive(){

// }

// // Plugin Deactive

// function wordCountdeActive(){
    
// }
// register_deactivation_hook(__FILE__, 'wordCountdeActive');

function wordCountCore(){
    load_plugin_textdomain( 'word-count',false , dirname ( __FILE__ ) . "/languages" );
}
add_action("plugin_loaded", "wordCountCore");


function  wordCounts($content){
    $stripped_content = strip_tags($content);
    $wordCount = str_word_count($stripped_content);
    $label  = __("Total Word Count", "word-count");
    $tags = "h3";
    $content .= sprintf("<%s>%s: %s</%s>",$tags , $label , $wordCount , $tags  );
    return $content;
}
add_filter( 'the_content', 'wordCounts');


function readTime($content){
    $stripped_content = strip_tags($content);
    $wordCount = str_word_count($stripped_content);
    $minutes  = ceil($wordCount / 200); 
    $newMintues = ($minutes > 60 ) ? $newMintues = floor($minutes / 60) : $newMintues = $minutes;
    $hours  = floor($minutes / 60);
    $seconds  = $minutes % 60;
    $label = apply_filters('timecountlabel-label', "Total Times :");
    $tags = apply_filters('countTimeTagsHTML', 'h4');
    
    $content .= sprintf("<%s>%s %s Hours %s Mintues %s Seconds</%s>" , $tags , $label , $hours , $newMintues , $seconds ,  $tags);
    return $content;
}
add_filter( 'the_content', 'readTime');




// link functions
include_once dirname(__FILE__).'/functions.php';
