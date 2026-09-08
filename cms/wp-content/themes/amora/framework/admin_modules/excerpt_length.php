<?php
//Function to Trim Excerpt Length & more..
function amora_excerpt_length( $length ) {
    return 23;
}
add_filter( 'excerpt_length', 'amora_excerpt_length', 999 );

function amora_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'amora_excerpt_more' );