<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $this->beginContent('//layouts/help_main'); ?>
<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>

			<div class="nav-collapse collapse">
				<ul class="nav">
					<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/logo_help.png" class="pull-left tc-logo-help" alt="">
					<li class="active">
						<a href="help_gettingstarted">Get started</a>
					</li>
					<li>
						<a href="help_usingtimecat">Using TimeCat 4.0</a>
					</li>
					<li class="">
						<a href="help_components">Components</a>
					</li>
					<li class="">
						<a href="bug_report">Bug Report</a>
					</li>
					<li class="">
						<a href="help_faqs">FAQs</a>
					</li>
					<li class="">
						<a href="help_contactus">Contacts Us</a>
					</li>
				</ul>
			</div>

			<a class="back-to-timecat-btn pull-right btn btn-success" href="./getting-started.html">Back To TimeCat</a>
		</div>
		<div class="row help-center-label">
			<h4>TimeCat 4.0 Help Center</h4>
		</div>
	</div>
</div>
<div class="tc-help-container container-fluid">

	<div class="row-fluid">
		<div id="tc-help-sidebar" class="span3">
			<ul id="help-sidebar" class="nav nav-list affix">
				<li><a href="#introduction-tms">Introduction to TMS <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#introduction-timecat">TimeCat 4.0 <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#included">Features and Functions <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#timecat-next">What's next <i class="pull-right icon-chevron-right"></i></a></li>

			</ul>
		</div>
		<div id="content" class="span8">
			<div class="row-fluid tc-help-header">
				<h1>Getting Started</h1>
				<p>An Overview of using Time Capture Tool (TimeCat) 4.0 and its Functions and Features.
					A brief introduction of Time Motion Studies(TMS)
				</p>
				<strong>If you are upgrading from TimeCat 3.0 <a>See Here</a> </strong>
			</div>
			<br>
			<section id="introduction-tms">
				<h3>1. Brief Introduction to Time Motion Studies (TMS)</h3>
				<hr>
				<p class='definition'><b>Time Motion Studies</b> - The observation and analysis of tasks within an activity with an emphasis on the amount of time required to perform the task.
				</p>
				<p >Time Motion Studies (TMS) are the accepted gold standard to study and quantify
					clinical workflow. Nevertheless methodological inconsistencies are rendering TMS results
					questionable, which threatens the external validity of individual studies.
					<br>
					In an effort to standardize TMS and promote the adoption of validated methods, 
					<a href="http://www.osu.edu/" >The Ohio State University </a> 
					department of <a href='http://bmi.osu.edu/'>Biomedical Informatics</a> 
					developed a free web-based tool to support data capture for TMS: <a>TimeCaT</a>.
					TimeCaT has been successful in spreading our methods, being adopted by national and international TMS researchers.
					<br>
					This adoption and acceptance rate surpassed our initial expectations and endanger the fragile architecture of our initial prototype and beta versions.
					This web based application (TimeCat 4.0) is an upgrade of TimeCaT to an enterprise level software that meet the security, stability and robustness requirement 
					of TMS tool. 
				</p>
				<br>
				<br>
				<ul class="thumbnails">
					<li class="span12">
						<div class="thumbnail">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/help/getting_started/tms_linear.png" class="pull-left" alt="">
							<h3>Linear TMS Type</h3>
							<p>The simplest TMS capture method is a <a>linear</a> type </p>
						</div>
					</li>
				</ul>
				<br>
				<ul class="thumbnails">
					<li class="span12">
						<div class="thumbnail">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/help/getting_started/tms_multitask.png" class="pull-left" alt="">
							<h3>Multitask TMS Type</h3>
							<p><b>Not</b> all TMS methods are linear, the most common <a>multitasking</a> data capturing type </p>
						</div>
					</li>
				</ul>

				<br>
				<div class="definition">
					<p>
						<b>Supported TMS methods in <a href="">TimeCat 4.0</a>. 
							<span class="label label-info">Heads Up! </span> These are also the 
							<a href=""> study types </a> when creating a TimeCat 4.0 study. 
						</b>
					</p>
					<ol>
						<li><a href="">Linear (sequential) time  </a></li>
						<li><a href="">Multitasking  </a></li>
						<li><a href="">Multi-Actor </a></li>
						<li><a href="">Multi-Observer Patient Flow. </a></li>
					</ol>
				</div>
			</section>
			<section id="introduction-timecat">
				<h3>2. Introduction to Time Capture Tool (TimeCat) 4.0 </h3>
				<hr>
				<p class='definition'><b>TimeCat 4.0 </b> - Is an improved web based application that implements the methods described in <a href="#introduction-tms">Time Motion Studies (TMS)</a>.
				</p>
				<br>
				<p>This new release of TimeCaT facilitates the widespread adoption of our validated methods, further contributing to the end goal of the TimeCaT project: the standardization 
					of TMS.
					<br>
					Due to the improved methods for capturing and visualizing interruptions, researchers focusing on patient safety and quality research can now benefit from TimeCaT 4.0.
					<br>
					The built-in quantitative and qualitative inter-observer reliability assessments included in this version contribute to the validation of the observers, and consequently to the results 
					and overall acceptance of TMS.
				</p>
			</section>
		</div>
	</div>
</div> <!-- /container -->

<?php $this->endContent(); ?>

