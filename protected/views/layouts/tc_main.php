<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" > <!--<![endif]-->
<!--[if !IE 7]> <style type="text/css">#wrap {display:table;height:100%}</style> <![endif]-->
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1.0">
		<title>TimeCaT 4</title>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/foundation.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/general_foundicons.css">
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/custom.modernizr.js"></script>
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/chelop.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/tre_temp.css" />
	</head>
	<body>
		<?php echo $content; ?>
		<!-- Footer -->
		<div id="footer" >
			<div class="row">
				<div class="large-12 columns">
					<div class="row">
						<div class="large-6 columns wexner hide-for-small"></div>
						<div class="large-6 columns elfoot">
							<p class="footwhite"><strong>TimeCaT &copy; 2011-<?php echo date("Y"); ?></strong><br/><em>Department of Biomedical Informatics</em><br/>The Ohio State University</p>
						</div>
					</div>
        </div>
			</div>
		</div>
		<!-- End Footer -->

		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/vendor/jquery.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/foundation.min.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/clpnewstudy.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/clpobservers.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tasks.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tre_dashboard.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tre_createstudy.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/tre_observers.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/clpclocker.js"></script>
		<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/aron_sites.js"></script>
		<script>
			$(document).foundation();
		</script>
	</body>
</html>
