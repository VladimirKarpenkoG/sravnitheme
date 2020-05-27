</div>
</div>
<footer class="footer">
        <div class="container">
          <nav class="footer-nav menu-main" aria-label="Подвал">
            <?php wp_nav_menu([
              'theme_location' => 'footer',
              'walker'=> new SravniWalker()])?>
          </nav>
          <div class="footer__info">
            <img class="footer__logo" src="/wp-content/themes/sravnitheme/img/footer-logo.svg"  alt='<?=__('Логотип сайта «Сравни»')?>'>
            <div class="footer__links">
              <div class="footer__links-label">Контактная информация</div>
              <a class="address__link address__link--btn" href="/author/">
                  <span class="address__text">Авторы</span>
              </a>
              <address class="footer__address">
                <a class="address__link address__link--phone" href="tel:+74996095132">
                  <span class="address__text">+7-499-609 41 32</span>
                  <div class="address__image"></div>
                </a>
                <a class="address__link address__link--mail" href="mailto:ak@geroy.ooo">
                  <span class="address__text">ak@geroy.ooo</span>
                  <div class="address__image"></div>
                </a>
                <a class="address__link address__link--mail" href="mailto:contact@geroy.ooo">
                  <span class="address__text">contact@geroy.ooo</span>
                  <div class="address__image"></div>
                </a>
              </address>
            </div>
          </div>
          <p class="footer__copyright">
          Copyright © sravni.cc <?= date('Y')?> Все права защищены
          </p>
        </div>
      </footer>
    </div>
  <?php wp_footer(); ?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-157151644-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-157151644-1');
</script>

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
  </body>
</html>