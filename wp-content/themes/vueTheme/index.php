<?php status_header(200); ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <?php wp_head(); ?>
</head>
<body>
  <div id="app"></div>
  <?php wp_footer(); ?>
 <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/vueTheme/dist/chunk-vendors.js"></script>
  <script type="text/javascript" src="<?php bloginfo('url'); ?>/wp-content/themes/vueTheme/dist/app.js"></script>  <!-- -->
</body>
</html>
