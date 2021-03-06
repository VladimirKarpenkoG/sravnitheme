<?php
class K8Short
{
	public $true_icon;
	public $false_icon;
	public $tbl_end;
	public $templ_url;

	public $td;
	public $_td;

	public $tr;
	public $_tr;

	public $b;
	public $_b;

	public $s;
	public $_s;

	public $mark1;
	public $_mark1;

	public $_ul;
	
	public function __construct( $atts ){

		$this->true_icon = $atts['true'];
		$this->false_icon = $atts['false'];
		$this->tbl_end = '</tbody></table></div>';
		$this->templ_url = get_template_directory() . '/shortcode-templates/';

		$this->th = '<th scope="col">';
		$this->_th = '</th>';

		$this->td = '<td>';
		$this->_td = '</td>';

		$this->tr = '<tr>';
		$this->_tr = '</tr>';

		$this->b = '<b>';
		$this->_b = '</b>';

		$this->s = '<strong>';
		$this->_s = '</strong>';

		$this->mark1 = '<mark>';
		$this->_mark1 = '</mark>';

		$this->em = '<em>';
		$this->_em = '</em>';

		$this->_ul = '</ul>';
		$this->_li = '</li>';

	
		#[K8_SH_HOWTO]
		add_shortcode( 'K8_SH_HOWTO', array( $this, 'howto') );
	}

	/**
	 * [td description]
	 * @param  [type] $args [
	 *   'class' - str
	 * ]
	 * @return [type]       [description]
	 */
	private function td( $args = array() ){
		$str = "<td class='%s'>";
		$class = '';
		if( isset($args['class']) ){
			$class = $args['class'];
		}
		return sprintf( $str, $class );
	}

	private function th( $args = array() ){
		$str = "<th class='%s'>";
		$class = '';
		if( isset($args['class']) ){
			$class = $args['class'];
		}
		return sprintf( $str, $class );
	}

	private function ul( $args = array() ){
		$str = "<ul class='%s'>";
		$class = '';
		if( isset($args['class']) ){
			$class = $args['class'];
		}
		return sprintf( $str, $class );
	}

	private function li( $args = array() ){
		$str = "<li class='%s'>";
		$class = '';
		if( isset($args['class']) ){
			$class = $args['class'];
		}
		return sprintf( $str, $class );
	}

	public function tbl_start( $attr = array() ){
		$str = '<div class="k8_tbl-resp %s"><table class="k8_compare-tbl mtb-30"><tbody>';
		( isset( $attr['add_clss'] ) ) ? $add_clss = $attr['add_clss'] : $add_clss = '';
		return sprintf( $str, $add_clss );
	}

	#K8_SH_HOWTO
	public function howto( $atts, $content, $tag ){
		// write_log(get_defined_vars());
		if( !isset( $atts['id'] ) || !filter_var($atts['id'], FILTER_VALIDATE_INT) ){
			echo __('Sorry nothing found. Please pass valid howto id' , 'k8lang_domain');
			return;
		}
		if( 'publish' !== get_post_status ( $atts['id'] ) ){
			echo __('Publish how to article first, please' , 'k8lang_domain');
			return;
		}
		global $wp;
		$k8_current_url = home_url( add_query_arg( array(), $wp->request ) );

		$k8_title = get_the_title( $atts['id'] );
		$k8_content = get_the_content( null, false, $atts['id'] );
		$k8_acf_howto_stp =	get_field('k8_acf_howto_stp', $atts['id']);
		$k8_acf_howto_supply =	get_field('k8_acf_howto_supply', $atts['id']);
		$k8_acf_howto_tool =	get_field('k8_acf_howto_tool', $atts['id']);
		$k8_acf_gen_schema =	get_field('k8_acf_gen_schema', $atts['id']);

		$schema = K8Schema::getHowTo([
			'pid' => $atts['id'],
			'k8_title' => $k8_title,
	   	'k8_content' => $k8_content,
			'k8_acf_howto_stp' => $k8_acf_howto_stp,
			'k8_current_url' => $k8_current_url,
			'k8_acf_howto_supply' => $k8_acf_howto_supply,
			'k8_acf_howto_tool' => $k8_acf_howto_tool
		]);
		wp_enqueue_style( 'k8-libs-lightgallery-css' );
		wp_enqueue_script( 'k8-libs-lightgallery-js' );
		wp_enqueue_style( 'k8_sh_howto-css' );
		ob_start();
		if($k8_acf_gen_schema && !is_feed()) echo '<script type="application/ld+json">' . $schema . '</script>';
		
		include $this->templ_url . $tag . '/list.php';
		$html = ob_get_clean();
		return $html;
	}

}
new K8Short([
	'true' => '<svg class="k8-t-f" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
							 viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
							<path fill="#33CC99" d="M147.7,73.9c-0.2,17.6-6.4,35.2-18.3,48.6c-2.3,2.6-4.9,5.1-7.6,7.4c-24.8,20.9-62.6,22.8-89.2,3.9
								c-3.2-2.3-6.3-4.9-9.1-7.6c-6.4-6.3-11.5-13.8-15.2-21.9C-2.6,79.7,1.2,49.8,18.5,29c5.6-6.8,12.5-12.6,20.2-16.9
								C62-1,91.4,0.3,113.6,15.3c1.1,0.7,1.4,2.2,0.7,3.3c-0.7,1.1-2.2,1.4-3.3,0.7c0,0,0,0,0,0c-7.1-3.6-13.5-7.4-21.4-9.2
								C73.4,6.4,56,9,41.7,17.3c-7,4-13.2,9.4-18.2,15.7c-5,6.3-8.9,13.5-11.2,21.2C7.5,69.5,8.6,86.4,15.4,101
								c3.4,7.2,8.1,13.8,13.8,19.3c23.5,22.5,61.7,23.5,86.3,2.2c22.2-19.3,28.2-52.9,13.7-78.7l-59.2,63.7l-0.3,0.3
								c-3.1,3.4-8.4,3.5-11.7,0.4c-0.2-0.2-0.5-0.5-0.7-0.7L32.5,78.2c-2-2.4-1.7-6,0.7-8c2.2-1.8,5.3-1.8,7.3,0l22.6,19L126,30.5l0.2-0.2
								c2.3-2.1,5.8-2,7.9,0.3c0.2,0.2,0.4,0.4,0.5,0.6C143.6,43.7,147.8,58.8,147.7,73.9z"/>
						</svg>',
	'false' => '<svg class="k8-t-f" version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
								 viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
								<path fill="#424242" d="M8.8,74.2C8.8,74.2,8.8,74.2,8.8,74.2L8.8,74.2C8.8,74.2,8.8,74.2,8.8,74.2z"/>
								<path fill="#00B2E2" d="M147.5,74.1c-0.1,7.2-1.2,14.4-3.1,21.6c-2.8,8.7-7.1,16.8-12.8,23.8c-5.7,7-12.6,13-20.4,17.5
									c-23.6,13.6-53.9,12.9-76.7-2.3c-7.4-5-13.9-11.3-19-18.6C-3.8,88.9-1.4,50.1,21.7,25.7c1.8-1.9,3.8-3.8,5.8-5.5
									C34.2,14.5,42,10,50.3,7.2c14.7-5.1,30.4-5,45.2-0.5c0,0,6.1,2.3,6.1,2.3c1.1,0.4,1.7,1.7,1.3,2.8c-0.4,1.1-1.6,1.7-2.7,1.3
									c0,0-0.2-0.1-0.2-0.1C84.2,7.4,67.9,6.2,52,12c-7.7,2.8-14.7,7-20.8,12.3C6.2,46.3,1.7,85,21.4,111.9c4.7,6.5,10.6,12,17.3,16.3
									c20.2,13,47.1,13.5,67.8,1c6.8-4.1,12.8-9.4,17.6-15.6c4.8-6.2,8.5-13.3,10.7-20.8c4.5-15,3.1-31.6-3.7-45.7
									c-2.6-5.3-5.9-10.2-9.8-14.6L83.4,72.2l23.4,23.4c3.2,3.2,3.2,8.4,0,11.6c-1.6,1.6-3.7,2.4-5.8,2.4c-2.1,0-4.2-0.8-5.8-2.4L72,84.1
									L50.2,107c-3.1,3.3-8.3,3.4-11.6,0.3c-3.3-3.1-3.4-8.3-0.3-11.6c0.1-0.1,0.2-0.2,0.3-0.3l22.9-21.8L38.5,50.6
									c-3.2-3.2-3.2-8.4,0-11.6c3.2-3.2,8.4-3.2,11.6,0l23.2,23.2l43.8-41.8l0.2-0.2c1.1-1,2.5-1.5,3.8-1.5l0.4,0c1.4,0,2.6,0.6,3.5,1.5
									c6.6,6.3,12,13.9,15.8,22.2C145.7,52.6,147.7,63.3,147.5,74.1z"/>
								<path fill="#424242" d="M8.8,74.2L8.8,74.2l0,0.1L8.8,74.2C8.8,74.2,8.8,74.2,8.8,74.2z"/>
							</svg>',
]);