<?php
function get_http_response_code($theURL) {
    $headers = get_headers($theURL);
    return substr($headers[0], 9, 3);
}

function bbh_webp($img_src){
    if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) == true || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) == true ) {
        $webp_img = $img_src.'.webp';
        if (get_http_response_code($webp_img) && intval(get_http_response_code($webp_img)) < 400 || file_exists($webp_img)) {
          $img_src = $webp_img;
        }
    }
    return $img_src;
}
function webp($img_src){
    if( strpos( $_SERVER['HTTP_ACCEPT'], 'image/webp' ) == true || strpos( $_SERVER['HTTP_USER_AGENT'], ' Chrome/' ) == true ) {
        $webp_img = $img_src.'.webp';
        if (get_http_response_code($webp_img) && intval(get_http_response_code($webp_img)) < 400 || file_exists($webp_img)) {
          $img_src = $webp_img;
        }
    }
    return $img_src;
}
?>
