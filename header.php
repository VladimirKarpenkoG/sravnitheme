<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="yandex-verification" content="c0635b4c3191db7d" />
  <meta id="viewport" name="viewport" content="initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, user-scalable=yes, width=device-width">
    <script>
      //mobile viewport hack
      (function(){
      
      function apply_viewport(){
      	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)   ) {
      
      	var ww = window.screen.width;
        var dw = 'device-width';
      	var mw = 414; // min width of site
      	var ratio =  ww / mw; //calculate ratio
      	var viewport_meta_tag = document.getElementById('viewport');
      	if( ww < mw){ //smaller than minimum size
      		viewport_meta_tag.setAttribute('content', 'initial-scale=' + ratio + ', maximum-scale=' + ratio * 7 + ', minimum-scale=' + ratio + ', user-scalable=yes, width=' + mw);
      	}
      	else { //regular size
      		viewport_meta_tag.setAttribute('content', 'initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0, user-scalable=yes, width=device-width');
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
           accurateTrackBounce:true,
           webvisor:true
      });
   </script>
   <noscript><div><img src="https://mc.yandex.ru/watch/59204332" style="position:absolute; left:-9999px;" alt="яндекс метрика" /></div></noscript>
   <!-- /Yandex.Metrika counter -->
</head>

<body <?php body_class(); ?>>
<!--LiveInternet counter--><script type="text/javascript">
document.write('<a href="//http://www.liveinternet.ru/click" '+
'target="_blank" class="d-none" rel="nofollow"><img src="//counter.yadro.ru/hit?t54.1;r'+

escape(document.referrer)+((typeof(screen)=='undefined')?'':

';s'+screen.width+'*'+screen.height+'*'+(screen.colorDepth?

screen.colorDepth:screen.pixelDepth))+';u'+escape(document.URL)+

';h'+escape(document.title.substring(0,150))+';'+Math.random()+
'" alt="" title="LiveInternet: показано число просмотров и'+
' посетителей за 24 часа" '+
'border="0" width="88" height="31"><\/a>')
</script><!--/LiveInternet-->
<div id="page">
<div class="header-mobile__menu" id="mobile-menu" style="display: none">
<?php wp_nav_menu(['theme_location' => 'mobile', 'menu_class' => 'mm-listview','walker'=> new MobileWalker()])?>
</div>
      <header class="header header--sticky">
        <div class="header-main">
          <div class="container">
            <div class="header-inner"><a class="header__home-link" href="<?=get_home_url('/')?>" aria-label="Main page"><img class="header__logo" src="/wp-content/themes/sravnitheme/img/logo_small.svg" alt="<?=__('Название сайта «Сравни»')?>"></a>
              <div class="header__items">
                <div class="search">
                  <?php get_search_form(); ?>
                </div>
                <?php /*
                <div class="header__buttons">
                  <div class="dropdown dropdown--theme_btn">
                    <button class="btn dropdown__btn btn--sm" id="lang-btn" aria-label="choose your language" aria-actions="lang-list"> <span>RUS</span><i class="btn__ico fas fa-angle-down"></i></button>
                    <ul class="dropdown__list" id="lang-list" aria-labelledby="lang-btn">
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
        </div>
        <div class="container">
          <nav class="header-nav menu-main" aria-label="Главная">
            <?php wp_nav_menu([
              'theme_location' => 'primary',
              'walker'=> new SravniWalker()])?>
          </nav>
        </div>
      </header>
      <div class="header-mobile"><a class="header__home-link" href="<?=get_home_url('/')?>"><img class="header-mobile__logo" src="/wp-content/themes/sravnitheme/img/logo_small.svg" alt='<?=__('Название сайта «Сравни»')?>'></a>
        <div class="hamburger hamburger--slider js-hamburger">
          <div class="hamburger-box">
            <div class="hamburger-inner"></div>
          </div>
        </div>
      </div>
      <div class="all-wrapper">
        <div class="container">
        <?php if (function_exists('rank_math_the_breadcrumbs') && !is_front_page()) rank_math_the_breadcrumbs(); ?>

        