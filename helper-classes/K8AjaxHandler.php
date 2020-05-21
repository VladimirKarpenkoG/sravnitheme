<?php
    class K8AjaxHandler {


        public function mainFilter() {
            
            $answer = new K8FilterAnswer();
            $requests = json_decode(file_get_contents('php://input'));
            if(!count($requests)) {
                $answer->init();
            } else {
                $term = get_term_by('id', $requests[0]->value, $requests[0]->key);

                $filters = get_field('k8_filter_option', $term);
                $answer->prepareAnswer($filters[count($requests) -1]);
                if((count($requests) -1) == count($filters)) {
                    $cat_args = [
                        'meta_query' => [
                            [
                               'key'       => 'related_k8tax_group',
                               'value'     => $term->term_id,
                            ]
                        ],'taxonomy'  => 'category'
                    ];
                        
                        $categories = get_terms( $cat_args );
                        $final_answer = new K8FinalAnswer(new K8AnswerForm(get_category_link($categories[0]->term_id)));
                    $final_answer->prepareAnswer($requests, $cat_args);
                    wp_send_json($final_answer);
                }
            }
            
            wp_send_json($answer);
        }

        public static function getActualCourse() {
            $course = get_option('currency_course');
            if(!$course) add_option( 'currency_course',[]);
            if(empty($course['date']) || date_diff(new DateTime(), new DateTime($course['date']))->days > 1) {
                self::updateCourse();
            }
            return $course;
        }
    
        public static function updateCourse() {
            $usd_content = file_get_contents('https://api.exchangeratesapi.io/latest?symbols=RUB&base=USD');
            $eur_content = file_get_contents('https://api.exchangeratesapi.io/latest?symbols=RUB&base=EUR');
            if($usd_content && $eur_content) {
                $usd_data = json_decode($usd_content);
                $eur_data = json_decode($eur_content);
                update_option( 'currency_course',[
                    'dollar' => round($usd_data->rates->RUB, 2),
                    'euro' => round($eur_data->rates->RUB, 2),
                    'date' => $usd_data->date
                ]);
            }
        }
}

class K8FilterAnswer {
    public $q = "Что вы ищете?";
    public $title = "Выберите один вариант";
    public $key = "k8tax_group";
    public $opts = [];

    function init() {
        $terms = get_terms(['taxonomy'=> $this->key, 'fields' => 'id=>name']);
        foreach($terms as $value => $label) {
            $this->opts[] = new K8FilterAnswerOption($label, $value);
        }
    }

    function prepareAnswer($question) {
        $this->q = $question['k8_option_title'];
        $this->key = $question['option_key'];
        $this->opts[] = new K8FilterAnswerOption("Назад", "previous_question");
        $this->opts[] = new K8FilterAnswerOption("Не имеет значения", "s");
        foreach($question['option_answer'] as $answer) {
            $this->opts[] =  new K8FilterAnswerOption($answer['answer_label'], [$answer['answer_value'], $answer['answer_value_to']]);
        }
    }
}

class K8FinalAnswer {
    public $a = '';
    public $form = null;
    public $modal = null;
    public $result = [];

    function __construct($f, $a = 'Мы не нашли ничего подходящего, попробуйте выбрать что-то другое') {
        $this->a = $a;
        $this->form = $f;
    }

    function prepareAnswer($requests) {

        $meta_query = [];
        $args =[
            'post_type' => 'services',
        ];

        
        foreach($requests as $request) {
            
            if($request->value[0] == 's' || $request->key == 's') continue;
            if(!empty($meta_query) && count($meta_query) > 1) $meta_query['relation'] = 'AND';

            if($request->key == 'k8tax_group') {  
                $args['tax_query'][] = [
                    'taxonomy' => 'k8tax_group',
                    'field'    => 'term_id',
                    'terms'    => $request->value,
                ];
                continue;
            }

            if($request->key == 'serv_filter_price' || $request->key == 'serv_filter_size_gb') {

                if(!empty($request->value[0]) && !empty($request->value[1])) {
                    $meta_query[] = [
                        [
                            'key' => $request->key,
                            'value' => [$request->value[0] - 0.01, $request->value[1] + 0.01],
                            'compare' => "BETWEEN"
                        ]
                ];

                }elseif(!$request->value[0] && $request->value[1] || $request->value[1] === 0) {
                    $meta_query[] = [
                            [
                                'key' => $request->key,
                                'value' => $request->value[1],
                                'compare' => '<='
                            ]
                    ];

                }elseif($request->value[0] && !$request->value[1]) {
                    $meta_query[] = [
                            [
                                'key' => $request->key,
                                'value' => $request->value[0],
                                'compare' => '=>'
                            ]
                    ];
                }

                continue;
            }

            if($request->key == 'or') {
                $meta_query[] = [
                    'key' => $request->value[0],
                    'value' => 1,
                ];
                continue;
            }

            if(!empty($request->value[0])) {
                $meta_query[] = [
                    'key' => $request->key,
                    'value' => $request->value[0],
                ];
            }

        }

        $args['meta_query'] = $meta_query;
        $query = new wp_query($args);
        $services = $query->posts;

        if($services) {
            $this->responseFound($services);
        } else {
            $this->responseNotFound($requests[0]);
        }
    }

    function responseFound($services) {

        $reviews = $this->getReviewsByServices($services);
        
        foreach($reviews as $review) {
            $img = get_the_post_thumbnail_url($review->ID);
            $this->result[] = new K8AnswerReview(get_field('k8_cmn_service_name', $review->ID), $img, $review->ID);
        }
        $this->a = 'Мы нашли следующие обзоры';
        $this->modal = new K8AnswerModal();

    }

    function responseNotFound($request) {
         $args = [
             'post_type' => 'services',
             'tax_query' => [[
                'taxonomy' => 'k8tax_group',
                'field'    => 'term_id',
                'terms'    => $request->value,
                ]]
            ];

        $query = new wp_query($args);
        $services = $query->posts;
        
        $reviews = $this->getReviewsByServices($services);
        
        foreach($reviews as $review) {
            $img = get_the_post_thumbnail_url($review->ID);
            $this->result[] = new K8AnswerReview(get_field('k8_cmn_service_name', $review->ID), $img, $review->ID);
        }
        
        $this->a ='К сожалению, мы не нашли сервисы подходящие под ваши запросы. Возможно, вас устроит один из сервисов с немного отличными параметрами?';
        $this->modal = new K8AnswerModal($this->a);
    }

    function getReviewsByServices($services) {

        $reviews_ids = [];
        foreach($services as $service) {
            $reviews_ids[] = get_field('review', $service->ID);
        }

        $reviews_args = [
            'post_type' => 'k8pt_review',
            'limit' => '-1',
            'post__in' => array_unique($reviews_ids),
            'meta_key' => 'k8_cmn_display_fields',
            'meta_value' => 1
        ];
        $query = new wp_query($reviews_args);
        return $query->posts;
    }

}

class K8AnswerForm {
    public $method = 'GET';
    public $action = '/category/sravnenie';
    public $submitTxt = 'К сравнению';

    function __construct($action) {
        $this->action = $action;
    }
}

class K8AnswerModal {
    public $title = 'Вам подходят следующие сервисы:';
    public $caption = 'Для сравнения выберите одновременно до 5-ти сервисов';
    function __construct($title = null, $caption = null) {
        if($title) {
            $this->title = $title;
        }

        if($caption) {
            $this->caption = $caption;
        }
    }
}

class K8AnswerReview {
    public $name = '';
    public $img = '';
    public $value = '';
    function __construct($n, $i, $v) {
        $this->name = $n;
        $this->img = $i;
        $this->value = $v;
    }
}

class K8FilterAnswerOption {
    public $label = '';
    public $value = '';
    function __construct($l, $v) {
        $this->label = $l;
        $this->value = $v;
    }
}