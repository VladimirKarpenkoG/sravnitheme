</div>
</div>
<footer class="footer">
        <div class="container">
          <nav class="footer-nav menu-main" aria-label="Подвал">
            <?php wp_nav_menu([
              'theme_location' => 'footer',
              'walker'=> new SravniWalker()])?>
          </nav>
          <div class="footer__info"><img class="footer__logo" src="/wp-content/themes/sravnitheme/img/footer-logo.svg"  alt="<?=__('Логотип сайта "Сравни"')?>">
            <address class="footer__address">
            <a class="address__link address__link--phone" href="tel:+74996095132">
              <span class="address__text">+7-499-609 41 32</span>
              <div class="address__image"></div>
            </a>
            <a class="address__link address__link--mail" href="mailto:contact@geroy.ooo">
              <span class="address__text">contact@geroy.ooo</span>
              <div class="address__image"></div>
            </a>
            <a class="address__link address__link--map" href="https://goo.gl/maps/t5WSnpHZuCv7crvSA" target="_blank">
              <span class="address__text">ул Северная №326, Краснодар, Россия</span>
              <div class="address__image"></div>
            </a>
            </address>
          </div>
          <p class="footer__copyright">
          Copyright © sravni.cc <?= date('Y')?> Все права защищены
          </p>
        </div>
      </footer>
    </div>
  <?php wp_footer(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async 
src="https://www.googletagmanager.com/gtag/js?id=UA-157151644-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157151644-1');
</script>
  </body>
</html>