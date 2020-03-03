<?php
class K8CronController {
    
    public static function updateFilterPrices() {
        $course = K8AjaxHandler::getActualCourse();
        $args =[
            'post_type' => 'services',
            'posts_per_page' => -1
        ];
        $query = new wp_query($args);
        $services = $query->posts;
        foreach ($services as $service) {
            $price = get_field('service_price', $service->ID);
            $curr = get_field('service_curr', $service->ID);
            switch ($curr) {
                case 'dollar':
                    $new_price = round($price * $course['dollar'],2);
                    break;
                case 'euro':
                    $new_price = round($price * $course['euro'],2);
                    break;
                case 'rub':
                    $new_price = $price;
                break;		
            }
            update_field('serv_filter_price', $new_price, $service->ID);
        }
    }
}