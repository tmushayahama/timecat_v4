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
					<li class="">
						<a href="help_gettingstarted">Get started</a>
					</li>
					<li class="">
						<a href="help_usingtimecat">Using TimeCat 4.0</a>
					</li>
					<li class="active">
						<a href="help_components">Components</a>
					</li>
					<li class="">
						<a href="bug_report">Bug Report</a>
					</li>
					<li class="">
						<a href="help_faqs">FAQs</a>
					</li>
					<li class="">
						<a href="/site/help_contactus">Contacts Us</a>
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
				<li><a href="#intro-components">Components Introduction <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#recovery">Password Recovery <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#profile">TimeCat Profile Management <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#studies">TimeCat Studies <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#tasks">TimeCat Tasks <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#sites">TimeCat Sites <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#observers">TimeCat Observers <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#observations">TimeCat Observations <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#notes">TimeCat Notes <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#messages">TimeCat Messaging System <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#reports">TimeCat Reports <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#calendar">TimeCat Calendar <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#exporter">TimeCat Data Exporter <i class="pull-right icon-chevron-right"></i></a></li>

			</ul>
		</div>
		<div id="content" class="span8">
			<div class="row-fluid tc-help-header">
				<h1>TmeCat 4.0 Components</h1>
				<p>Make use of all the components included TimeCat 4.0. Explore how they work.
				</p>
				<strong>If you are upgrading from TimeCat 3.0 <a>See New Components Here</a> </strong>
			</div>
			<br>
			<section id="intro-components">
				<h3>1. TimeCat 4.0 Components</h3>
				<hr>
				<p class='definition'><span class="label label-info">Heads Up!</span> If you are observing and not the study creator nor the 
					administrator of a particular study, you might have less privileges in using some components.
				</p>
				<br>
				<br>
				<p>
					The history of TimeCat Components and how we have improved them is best summarized 
					on the table below.
				</p>
				<br>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Component</th>
							<th>TimeCat 1.0</th>
							<th>TimeCat 2.0</th>
							<th>TimeCat 3.0</th>
							<th>TimeCat 4.0</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<th>Studies</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Tasks</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Sites</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Observers</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Observations</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Study</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Study</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Study</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Study</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Study</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
						<tr>
							<th>Study</th>
							<th></th>
							<th></th>
							<th></th>
							<th></th>
						</tr>
					</tbody>
				</table>
				

				<br>
				
			</section>
			<section id="recovery">
				<h3>2. TimeCat 4.0 Recovery System </h3>
				<hr>
				<p class='definition'> Not only
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

