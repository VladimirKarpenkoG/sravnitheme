<?php 
class SravniWalker extends Walker_Nav_Menu {

function start_lvl(&$output, $depth = 0, $args = null) {
    
    $output .= '<ul class="sub-menu dropdown__list">';
}
/**
 * @see Walker::start_el()
 * @since 3.0.0
 *
 * @param string $output
 * @param object $item Объект элемента меню, подробнее ниже.
 * @param int $depth Уровень вложенности элемента меню.
 * @param object $args Параметры функции wp_nav_menu
 */
function start_el(&$output, $item, $depth = 0, $args = NULL, $id = 0) {
    global $wp_query;           

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    

    /*
     * Генерируем строку с CSS-классами элемента меню
     */
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $classes[] = 'menu-item-' . $item->ID;

    if($args->walker->has_children)
    {
        $classes[] = "dropdown";
        $classes[] = "dropdown--inline";
        $item->url = 'javascript:void(0)';
    }   

    // функция join превращает массив в строку
    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
    $class_names = ' class="' . esc_attr( $class_names ) . '"';

    /*
     * Генерируем ID элемента
     */
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

    /*
     * Генерируем элемент меню
     */
    $output .= $indent . '<li' . $id . $value . $class_names .'>';


    // атрибуты элемента, title="", rel="", target="" и href=""
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    if($depth == 1) {
        $args->link_before = '<span>';
        $args->link_after = '</span>';
    }

    // ссылка и околоссылочный текст
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

     $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}