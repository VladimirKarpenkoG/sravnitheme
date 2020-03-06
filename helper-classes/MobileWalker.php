<?php
class MobileWalker extends Walker_Nav_Menu {
    function start_lvl(&$output, $depth = 0, $args = null) {
        
        $output .= '<ul class="mm-listview">';
    }
}