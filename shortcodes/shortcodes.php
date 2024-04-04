<?php 

function windaddy_casino_view($atts, $content) {
    $html =  "display";
    ob_start();
    include_once ('templates/casino.php');
    $html = ob_get_contents();
    ob_end_clean();
    return "casino section";
}

add_shortcode('casino_view','windaddy_casino_view');