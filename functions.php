<?php

function countTimelabel($label){
    return "Total Reading Time: ";
}
add_filter( 'timecountlabel-label', 'countTimelabel' );


function countTimeTags($tags){
    return "h3";
}
add_filter( 'countTimeTagsHTML', 'countTimeTags');
