<?php


function recursive_rtrim($str) { 
    $output = $str;
    $char = array(',','; ', '?', '!','.','@','#');
    foreach( $char as $i ){
        $output = rtrim($str,$i); 
    }
    return trim( $output );
}

function get_the_summary( $str, $limit = 100, $after = false ){
    $str = strip_tags($str);
    $first_space_after = strpos( substr($str, $limit ) , ' ') ;
    
    if ( $first_space_after !== false) {

        return recursive_rtrim( substr( $str , 0, $limit+$first_space_after ) ) . ( $after ? $after : '' ); 
    }
    
    return $str;
}
