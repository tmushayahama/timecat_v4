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
        <?php echo CHtml::link('Log Out', Yii::app()->controller->module->logoutUrl, array('class'=>'button alert')) ?>
      </li>
    </ul>
  </section>
</nav>
  <!-- End Header and Nav -->
  <div class="row">
 <!-- Nav Sidebar -->
    <!-- This is source ordered to be pulled to the left on larger screens -->
    <div class="large-4 columns ">
      <div class="panel">
        <h5>
            <a href="#"><?php echo Yii::app()->user->firstname ?></a> 
            <a href="#"><?php echo Yii::app()->user->lastname ?></a>
            <a href="http://localhost/timecat_v4/index.php/user/profile/edit" class="tiny button  right">Edit</a>
        </h5>
        <div class="row">
        <?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$this->avatar, "avatar",array("width"=>200, 'height'=>200)); ?>  
        
        </div>
        <?php echo $content; ?>
          
      </div>
    </div>
    
    <!-- Main Feed -->
    <!-- This has been source ordered to come first in the markup (and on small devices) but to be to the right of the nav on larger screens -->
    <div class="large-8 columns">
      <!-- Feed Entry -->
        <div class="row">
            <div class="large-12 columns">
                
                 <div class="large-6 columns"><img src="http://placehold.it/240x120&text=[Create New Study]" /></div>
                 <div class="large-6 columns"><img src="http://placehold.it/240x120&text=[View Other Studies]" /></div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="large-11 columns ">
                <div class="panel callout">
                    <h3>My Study 1</h3>
                </div
                <br>
                <div class="panel callout">
                    <h3>My Study 2</h3>
                </div
                <br>
                <div class="panel callout">
                    <h3>My Study 3</h3>
                </div>
                <br>
                <div class="panel callout">
                    <h3>My Study 41</h3>
                </div
                <br>
                <div class="panel callout">
                    <h3>My Study 20</h3>
                </div
                <br>
                <div class="panel callout">
                    <h3>My Study 13</h3>
                </div>
            </div>
        </div>
    </div>
  </footer>

</body>
</html>
