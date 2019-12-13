</div>
</div>
<footer class="footer">
        <div class="container">
          <nav class="footer-nav menu-main" aria-label="Подвал">
            <?php wp_nav_menu([
              'theme-location' => 'footer',
              'walker'=> new Sravni_Walker_Nav_Menu()])?>
          </nav>
          <div class="footer__info"><img class="footer__logo" src="/wp-content/themes/sravnitheme/img/footer-logo.svg">
            <address class="footer__address"><a class="address__link" href="tel:+74996095132"><span class="address__text">+7-499-609 41 32</span><img class="address__image" src="/wp-content/themes/sravnitheme/icons/contact-phone.svg"></a><a class="address__link" href="mailto:contact@geroy.ooo"><span class="address__text">contact@geroy.ooo</span><img class="address__image" src="/wp-content/themes/sravnitheme/icons/contact-mail.svg"></a><a class="address__link" href="https://goo.gl/maps/t5WSnpHZuCv7crvSA" target="_blank"><span class="address__text">ул Северная №26, Краснодар, Россия</span><img class="address__image" src="/wp-content/themes/sravnitheme/icons/contact-map.svg"></a></address>
          </div>
          <p class="footer__copyright">
            ©Информация о правах. Lorem Ipsum — это текст-рыба, который используют издатели и дизайнеры, если оригинальный текст недоступен.
            Lorem Ipsum подставляют, чтобы не задерживать рабочий процесс и чтобы согласовать дизайн с заказчиком.
          </p>
        </div>
      </footer>
    </div>
  <?php wp_footer(); ?>
  </body>
</html>