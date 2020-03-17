<?php
class K8HowTo {
    function __construct() {
        add_action( 'init', array( $this, 'k8pt_howto_reg' ) );
        add_action( 'acf/init', array( $this, 'k8pt_howto_cf' ) );
        #Add how to shortcode to admin
        add_filter( 'manage_k8pt_howto_posts_columns', array( $this, 'k8pt_howto_cols' ) );
        add_action( 'manage_k8pt_howto_posts_custom_column' , array( $this, 'k8pt_howto_col' ), 10, 2 );
    }

    public function k8pt_howto_cols($columns){
		$columns['howto_shrt'] = __( 'Shortcode', 'k8lang_domain' );
		return $columns;
	}
	public function k8pt_howto_col($column, $post_id){
		if( $column == 'howto_shrt' ){
			echo "<code>[K8_SH_HOWTO id='$post_id']</code>";
		}
    }
    public function k8pt_howto_reg() {
        $labels = [
			"name" => __( "HowTo's", "k8lang_domain" ),
			"singular_name" => __( "HowTo", "k8lang_domain" ),
		];

		$args = [
			"label" => __( "HowTo's", "k8lang_domain" ),
			"labels" => $labels,
			"description" => "",
			"public" => false,
			"publicly_queryable" => false,
			"show_ui" => true,
			"show_in_rest" => false,
			"rest_base" => "",
			"rest_controller_class" => "WP_REST_Posts_Controller",
			"has_archive" => false,
			"show_in_menu" => true,
			"show_in_nav_menus" => false,
			"delete_with_user" => false,
			"exclude_from_search" => true,
			"capability_type" => "post",
			"map_meta_cap" => true,
			"hierarchical" => false,
			"rewrite" => false,
			"query_var" => false,
			"menu_icon" => "dashicons-excerpt-view",
			"supports" => [ "title", "editor", "thumbnail" ],
		];

		register_post_type( "k8pt_howto", $args );
    }
    public function k8pt_howto_cf(){
		if( function_exists('acf_add_local_field_group') ):
			acf_add_local_field_group(array(
				'key' => 'group_5df4b76c17916',
				'title' => 'HowTo',
				'fields' => array(
					array(
						'key' => 'field_5e26f08d49f08',
						'label' => 'Steps',
						'name' => 'k8_acf_howto_stp',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'table',
						'button_label' => '',
						'sub_fields' => array(
							array(
								'key' => 'field_5e26fd1ca9f71',
								'label' => 'Number',
								'name' => 'num',
								'type' => 'number',
								'instructions' => '',
								'required' => 1,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '5',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'min' => '',
								'max' => '',
								'step' => '',
							),
							array(
								'key' => 'field_5e26f0bf49f09',
								'label' => 'Head',
								'name' => 'head',
								'type' => 'text',
								'instructions' => '',
								'required' => 1,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '25',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
							array(
								'key' => 'field_5e26f0dc49f0a',
								'label' => 'Text',
								'name' => 'txt',
								'type' => 'wysiwyg',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '50',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'tabs' => 'all',
								'toolbar' => 'full',
								'media_upload' => 1,
								'delay' => 0,
							),
							array(
								'key' => 'field_5e26f0f549f0b',
								'label' => 'Image',
								'name' => 'img',
								'type' => 'image',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '20',
									'class' => '',
									'id' => '',
								),
								'return_format' => 'id',
								'preview_size' => 'medium',
								'library' => 'all',
								'min_width' => '',
								'min_height' => '',
								'min_size' => '',
								'max_width' => '',
								'max_height' => '',
								'max_size' => '',
								'mime_types' => '',
							),
						),
					),
					array(
						'key' => 'field_5e297d2bb5f65',
						'label' => 'Supply',
						'name' => 'k8_acf_howto_supply',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'table',
						'button_label' => '',
						'sub_fields' => array(
							array(
								'key' => 'field_5e297d45b5f66',
								'label' => 'Text',
								'name' => 'txt',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					),
					array(
						'key' => 'field_5e297d62b5f67',
						'label' => 'Tool',
						'name' => 'k8_acf_howto_tool',
						'type' => 'repeater',
						'instructions' => '',
						'required' => 1,
						'conditional_logic' => 0,
						'wrapper' => array(
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'collapsed' => '',
						'min' => 0,
						'max' => 0,
						'layout' => 'table',
						'button_label' => '',
						'sub_fields' => array(
							array(
								'key' => 'field_5e297d73b5f68',
								'label' => 'Text',
								'name' => 'txt',
								'type' => 'text',
								'instructions' => '',
								'required' => 0,
								'conditional_logic' => 0,
								'wrapper' => array(
									'width' => '',
									'class' => '',
									'id' => '',
								),
								'default_value' => '',
								'placeholder' => '',
								'prepend' => '',
								'append' => '',
								'maxlength' => '',
							),
						),
					),
				),
				'location' => array(
					array(
						array(
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'k8pt_howto',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'normal',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => true,
				'description' => '',
			));
		endif;
	}
}
new K8HowTo();