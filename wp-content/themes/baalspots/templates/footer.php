<div class="sticky-footer">
  <div class="sticky-footer-left">
    <img src="<?= get_template_directory_uri(); ?>/dist/images/man.png">
    <p class="is-hidden-mobile">We’re here to help! Get in Touch</p>
    <p class="is-hidden-desktop">Get in touch</p>
  </div>
  <div class="sticky-footer-right">
    <a class="cta btn-call"><img src="<?= get_template_directory_uri(); ?>/dist/images/call.png"><p>Call</p></a>
    <a class="cta btn-chat"><img src="<?= get_template_directory_uri(); ?>/dist/images/chat.png"><p>Chat</p></a>
    <a class="cta btn-email"><img src="<?= get_template_directory_uri(); ?>/dist/images/email.png"><p>Email</p></a>
  </div>
</div>
<footer class="content-info">
  <div class="container">
    <div class="social-share">
      <a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/instagram.png"></a>
      <a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/twitter.png"></a>
      <a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/facebook.png"></a>
      <a href=""><img src="<?= get_template_directory_uri(); ?>/dist/images/google.png"></a>
    </div>
    <?php dynamic_sidebar('sidebar-footer'); ?>
  </div>
</footer>
