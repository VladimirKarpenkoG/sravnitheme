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
</head>

<body <?php body_class(); ?>>
<div id="page">
<div class="header-mobile__menu" id="mobile-menu" style="display: none">
  <ul id="main-menu">
    <li><a href="#">Обзоры</a></li>
    <li class="current-menu-item"><span>Сравнение</span>
      <ul>
        <li><a href="#">Скачать софт</a></li>
        <li><a href="#">Инструкции</a></li>
        <li><a href="#">Полезная информация</a></li>
        <li><a href="#">Новости</a></li>
        <li><a href="#">Помощь</a></li>
      </ul>
    </li>
    <li><a href="#">Скачать софт</a></li>
    <li><a href="#">Инструкции</a></li>
    <li><a href="#">Полезная информация</a></li>
    <li><a href="#">Новости</a></li>
    <li><a href="#">Помощь</a></li>
  </ul>
  <ul class="header-mobile__lang" id="lang-menu">
    <li><a href="http://">Russian</a></li>
    <li><a href="http://">German</a></li>
    <li><a href="http://">English</a></li>
  </ul>
  <ul class="icon-bottom">
    <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
    <li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
    <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
    <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
  </ul>
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
              'theme-location' => 'primary',
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
        <?php new Kd89Bread;?>