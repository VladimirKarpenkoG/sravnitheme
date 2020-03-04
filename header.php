<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta id="viewport" name="viewport" content="width=414, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">
    <script>
      //mobile viewport hack
      (function(){
      
      function apply_viewport(){
      	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)   ) {
      
      	var ww = window.screen.width;
      	var mw = 414; // min width of site
      	var ratio =  ww / mw; //calculate ratio
      	var viewport_meta_tag = document.getElementById('viewport');
      	if( ww < mw){ //smaller than minimum size
      		viewport_meta_tag.setAttribute('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio * 1.4 + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + mw);
      	}
      	else { //regular size
      		viewport_meta_tag.setAttribute('content', 'initial-scale=1.0, maximum-scale=1, minimum-scale=1.0, user-scalable=yes, width=' + ww);
      	}
      	}
      }
      
      //ok, i need to update viewport scale if screen dimentions changed
      window.addEventListener('resize', function(){
      	apply_viewport();
      });
      
      	apply_viewport();
      }());
      
    </script>

	<?php wp_head(); ?>
  <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
      m[i].l=1*new 
   Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
   
      ym(59204332, "init", {
           clickmap:true,
           trackLinks:true,
           accurateTrackBounce:true
      });
   </script>
   <noscript><div><img src="https://mc.yandex.ru/watch/59204332" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
   <!-- /Yandex.Metrika counter -->
</head>

<body <?php body_class(); ?>>
<div id="page">
<div class="header-mobile__menu" id="mobile-menu" style="display: none">
<?php wp_nav_menu(['theme_location' => 'mobile', 'menu_class' => 'mm-listview'])?>
</div>
      <header class="header">
        <div class="header-main">
          <div class="container">
            <div class="header-inner"><a class="header__home-link" href="#" aria-label="Main page"><img class="header__logo" src="/wp-content/themes/sravnitheme/img/logo_small.svg"></a>
              <?php /*
              <div class="header__buttons">
                <div class="dropdown dropdown--theme_btn">
                  <button class="btn dropdown__btn btn--sm" id="lang-btn" aria-label="choose your language" aria-actions="lang-list"> <span>RUS</span><i class="btn__ico fas fa-angle-down"></i></button>
                  <ul class="dropdown__list" id="lang-list" aria-labeledby="lang-btn">
                    <li class="dropdown__item"><a class="dropdown__link">ENG</a></li>
                    <li class="dropdown__item"><a class="dropdown__link">GER</a></li>
                    <li class="dropdown__item"><a class="dropdown__link">RUS</a></li>
                  </ul>
                </div>
                <a class="btn btn--sm" href="javascript:void(0);">Вход</a>
              </div>*/ ?>
            </div>
          </div>
        </div>
        <div class="container">
          <nav class="header-nav menu-main" aria-label="Главная">
            <?php wp_nav_menu([
              'theme_location' => 'primary',
              'walker'=> new SravniWalker()])?>
          </nav>
          <div class="search">
	  			<?php get_search_form(); ?>
          </div>
        </div>
      </header>
      <div class="header-mobile"><a class="header__home-link"><img class="header-mobile__logo" src="/wp-content/themes/sravnitheme/img/logo_small.svg"></a>
        <div class="hamburger hamburger--slider js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </div>
      <div class="all-wrapper">
        <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs') && !is_front_page()) rank_math_the_breadcrumbs(); ?>

        