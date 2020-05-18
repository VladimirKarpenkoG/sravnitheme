<?php 
	
	class Kd89Helper
	{
			
		// public function __construct(argument){
			
		// }

		static function getDefUrl( $img ){
		
			return get_template_directory_uri() . '/dist/img/' . $img;
		
		}

		static function getFeatImgUrl( $post_id, $size = 'full' ){
		
			return wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );
		
		}

		static function getImgUrl( $img_id, $size = 'full' ){
		
			return wp_get_attachment_image_src( $img_id, $size );
		
		}

		static function getRandomFromArray( $arr ){
			$randomm = array_rand( $arr, 1 );
			return get_template_directory_uri() . '/dist/img/' . $arr[$randomm];
		}

		//Custom Length Excerpt
		static function excerpt($limit) {

      $excerpt = explode(' ', get_the_excerpt(), $limit);
      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }
      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);
      return $excerpt;

		}

		//Custom Length Content
		static function content($limit) {
	    
	    $content = explode(' ', get_the_content(), $limit);
	    if (count($content) >= $limit) {
	        array_pop($content);
	        $content = implode(" ", $content) . '...';
	    } else {
	        $content = implode(" ", $content);
	    }
	    $content = preg_replace('/\[.+\]/','', $content);
	    $content = apply_filters('the_content', $content); 
	    $content = str_replace(']]>', ']]&gt;', $content);
	    return $content;

		}


		//Pagination
		static function pagination($pages = '', $range = 2){

			$showitems = ($range * 2)+1;  
			global $paged;
			if(empty($paged)) $paged = 1;
			if($pages == ''){

				global $wp_query;
				$pages = $wp_query->max_num_pages;
				if(!$pages)
				{
				   $pages = 1;
				}

			}   

			if(1 != $pages){?>
				<nav class="pagination" role="navigation" aria-label="Pagination">
          			<ul class="pagination__list">

				<?php 
				if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
				if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

				for ($i=1; $i <= $pages; $i++)
				{
				   if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
				   {
					   echo '<li class="pagination__item '. ($paged == $i ? 'pagination__item--active':'').'"><a class="pagination__link" href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
				   }
				}

				if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
				if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";?>
					</ul>
				</nav><?php
			}
		}


		/**
	 * [getImg description]
	 * @param  [type] $args [
	 *  'img_id' - int,
	 *  'size' - mixed ( string | array )
	 *  'class' - string
	 * ]
	 * @return [type]       [html string]
	 */
	static function getImgHtml( $args ){
		$class = "";
		extract( $args );
		unset( $args );
		$str = '<img src="%s" class="%s" alt="%s" title="%s" width="%d" height="%d">';
		$img_data =	wp_get_attachment_image_src( $img_id, $size );
		return sprintf( $str,
										$img_data[0],
										$class,
										get_post_meta($img_id, '_wp_attachment_image_alt', TRUE),
										get_the_title($img_id),
										$img_data[1],
										$img_data[2] );
	}

	static function makeSlug($string) {
		$ctl = new \Cyr_To_Lat\Main();
		$text = preg_replace('~[^\pL\d]+~u', '-', $ctl->ctl_sanitize_title($string));
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		$text = preg_replace('~[^-\w]+~', '', $text);
		$text = trim($text, '-');
		$text = preg_replace('~-+~', '-', $text);
		$text = strtolower($text);

		if (empty($text)) {
			return 'n-a';
		}

		return $text;

	}
}