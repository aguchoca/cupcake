<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>
<a id="init"></a>
<?php include_once('estructura_header.inc') ?>


<?php if(user_is_anonymous()) : ?>
<a id="main-content"></a>
<div class="main-container-wrapper">
<?php
  $login_background = theme_get_setting('login_background');
  if(empty($login_background)) {
    $login_background = $base_path.$directory.'/img/backgrounds/login.jpg';
  }
  else {
    $login_background = file_create_url(file_load($login_background)->uri);
  }
?>
  <div id="page-header" style="background-image:url('<?php print $login_background; ?>');">
  </div> <!-- /#page-header -->
  <div class="main-container container">
    <?php print $messages; ?>
    <div class=" login-wrapper" style="position: relative">
      <?php $elements = drupal_get_form("user_login_block");
            $form = drupal_render($elements);
            print $form; ?>
    </div>
  </div>
  <a class="view-more-button" href="#a-tu-lado"></a>
</div>


<div class="divider row" style="  text-align: center; padding: 35px 0;">
  <div class="container" style="text-align:center; " >
  <h3>SI QUIERES HACER PARTE DE SIEMPRE A TU LADO,</h3>
  <p>CONTACTA A TU ASESOR SUFI O LLAMA AL <?php print theme_get_setting('telefono'); ?></p>
  </div>
</div>


<a id="a-tu-lado"></a>
<section class="seccion-a-tu-lado home-preview container-fluid">
  <div class="container">
    <div class="preview-wrapper">
      <h4>Siempre a tu lado</h4>
      <h3>PARA PENSAR EN GRANDE, PARA LOGRAR EN GRANDE.</h3>
      <p>Es un programa para ayudarte a alcanzar tus sueños, impulsarte a que logres todo lo que te propones, apoyarte en todo momento y darte una mano siempre que lo necesites.</p>
    </div>
  </div>
</section>
<a id="beneficios"></a>
<section class="seccion-beneficios home-preview container-fluid">
  <div class="container">
    <div class="preview-wrapper">
      <h4>Beneficios</h4>
      <h3>PARA SENTIRSE PRIVILEGIADO SIEMPRE.</h3>
      <p>Pensando en tu futuro y en lo mejor para ti, contamos con varios aliados que te ofrecen beneficios exclusivos por ser parte de <b>Sufi, Siempre a tu Lado.</b></p>
    </div>
  </div>
</section>
<a id="incentivos"></a>
<section class="seccion-incentivos home-preview container-fluid">
  <div class="container">
    <div class="preview-wrapper">
      <h4>Incentivos</h4>
      <h3>PARA PONERLE MÁS PASIÓN A LO QUE HACES.</h3>
      <p>En <b>Sufi, Siempre a tu lado</b> buscamos conocerte y es por eso que tenemos un plan de premios pensado especialmente en tus gustos; en el que recompensamos todo tu esfuerzo de una forma sorprendente.</p>
    </div>
  </div>
</section>

<?php else: ?>
<div class="main-container-wrapper">
   <div id="page-header" style="background-image:url('<?php print $base_path.$directory; ?>/img/backgrounds/home.jpg');">
    </div> <!-- /#page-header -->
  <div class="main-container">

    <div class="container-fluid" style="position:relative;  padding-right: 50px;">
    <!-- No Sidebar, neither breathcrumb -->
      <a id="main-content"></a>
      <section<?php print $content_column_class; ?>>
        <?php if (!empty($page['highlighted'])): ?>
          <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
        <?php endif; ?>
        <?php print $messages; ?>
        <?php if (!empty($tabs)): ?>
          <?php print render($tabs); ?>
        <?php endif; ?>
        <?php if (!empty($page['help'])): ?>
          <?php print render($page['help']); ?>
        <?php endif; ?>
        <?php if (!empty($action_links)): ?>
          <ul class="action-links"><?php print render($action_links); ?></ul>
        <?php endif; ?>

        <div class="frontpage-welcome-message">
          <?php $bienvenida = theme_get_setting('bienvenida'); if(isset($bienvenida)) : ?>
            <h1><?php print $bienvenida['titulo']; ?></h1>
            <p><?php @print($bienvenida['mensaje']['value']); ?></p>
          <?php endif; ?>
        </div>
        <div class="frontpage-buttons-wrapper">
          <?php if(in_array('comisionista', $user->roles)) : ?>
            <a href="<?php print $base_path; ?>perfil/contacto">
              <img src="<?php print $base_path.$directory; ?>/img/icons/completa-perfil.png">
              <span>COMPLETA TU REGISTRO</span>
            </a>
          <?php endif; ?>
          <?php if(theme_get_setting('video')) : ?>
            <a onclick="playVideo('<?php print theme_get_setting('video') ?>')">
              <img src="<?php print $base_path.$directory; ?>/img/icons/video-play.png">
              <span>VER VIDEO</span>
            </a>
          <?php endif; ?>
        </div>
      </section>


    </div>
  </div>
</div>

<?php endif; ?>

<?php include_once('estructura_footer.inc') ?>

<?php if(user_is_anonymous()) : ?>

  <a href="#init" class="button" id="go-up-button">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>

<?php endif; ?>
