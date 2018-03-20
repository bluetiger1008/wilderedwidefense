<div class="sticky-footer">
  <div class="sticky-footer-left">
    <img src="<?= get_template_directory_uri(); ?>/dist/images/man.png">
    <p class="is-hidden-mobile">We fight for your freedom. Contact us now</p>
    <p class="is-hidden-desktop">Contact us now</p>
  </div>
  <div class="sticky-footer-right">
    <a class="cta btn-call is-hidden-mobile" id="btn_call"><img src="<?= get_template_directory_uri(); ?>/dist/images/call.png"><p>Call</p></a>
    <a class="cta btn-call is-hidden-desktop is-hidden-tablet" href="tel:(214) 741-4000"><img src="<?= get_template_directory_uri(); ?>/dist/images/call.png"><p>Call</p></a>
    <a class="cta btn-chat"><img src="<?= get_template_directory_uri(); ?>/dist/images/chat.png"><p>Chat</p></a>
    <!-- <a class="cta btn-email"><img src="<?= get_template_directory_uri(); ?>/dist/images/email.png"><p>Email</p></a> -->
  </div>
</div>

<footer class="content-info">
  <div class="container">
    <div class="social-share">
      <a href="https://www.instagram.com/thewilderfirm/" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/instagram.png"></a>
      <a href="https://twitter.com/TheWilderFirm" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/twitter.png"></a>
      <a href="https://www.facebook.com/pages/Wilder-Defense/485379268282490?ref" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/facebook.png"></a>
      <a href="https://www.linkedin.com/pub/douglas-wilder/b7/3b1/b97" target="_blank"><img src="<?= get_template_directory_uri(); ?>/dist/images/icon-ln-w.png"></a>
    </div>
    <?php dynamic_sidebar('sidebar-footer'); ?>
    <p class="copyright">©<?php echo date("Y"); ?> The Wilder Firm</p>
  </div>
</footer>

<div id="call-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <h3>DO YOU HAVE A LEGAL QUESTION?</h3>
      <p>Enter your phone number in the boxes below and we will call you immediately.</p>
      <script type="text/javascript" src="https://550groupllc.formstack.com/forms/js.php/phone_number_sticky_global"></script>
      <p>Call us anytime toll Free (214) 741-4000</p>
    </section>
  </div>
</div>

<div id="email-modal" class="modal">
  <div class="modal-background"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <button class="delete" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <script type="text/javascript" src="https://550groupllc.formstack.com/forms/js.php/contact_us_sticky_global"></script>
    </section>
  </div>
</div>
