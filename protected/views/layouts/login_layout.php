<?php /* @var $this Controller */ ?>

<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title><?php echo CHtml::encode($this->pageTitle); ?></title>
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/normalize.css" />
  <!-- If you are using CSS version, add this -->
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css" />
  <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/app.css" />

  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>

</head>
<body>

  <!-- body content here -->

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? '<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/zepto' : '<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.alerts.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.clearing.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.cookie.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.dropdown.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.forms.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.joyride.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.magellan.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.orbit.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.placeholder.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.reveal.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.section.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.tooltips.js"></script>
  <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation/foundation.topbar.js"></script>
  <script>
  $(document).foundation();
  </script>
  
 <nav class="top-bar">
  <ul class="title-area">
    <!-- Title Area -->
    <li class="name">
      <h1><a href="#">Time Cat </a></h1>
    </li>
    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
    <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
  </ul>

  <section class="top-bar-section">
    <!-- Left Nav Section -->
    <ul class="left">
      <li class="divider"></li>
      <li><a href="#">Explore</a></li>
      <li class="divider"></li>
      <li><a href="#">Tutorials</a></li>
      <li class="divider"></li>
    </ul>

    <!-- Right Nav Section -->
    <ul class="right">
      <li class="divider hide-for-small"></li>
      
      <li class="divider show-for-small"></li>
      <li class="has-form">
        <?php echo CHtml::link('Sign Up', Yii::app()->controller->module->registrationUrl, array('class'=>'button')) ?>
      </li>
    </ul>
  </section>
</nav>
  <!-- End Header and Nav -->
  <div class="row">
 
        <div class="row">
            <div class="large-6 columns"> 
                  <?php echo $content; ?>
            </div>
        </div>
  </div>
  </footer>

</body>
</html>
