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
						<a class="tc-active"href="help_usingtimecat">Using TimeCat 4.0</a>
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
			<ul id="help-sidebar" class="nav nav-pills nav-stacked affix">
				<li><a href="#introduction-tms">Introduction to TMS <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#introduction-timecat">TimeCat 4.0 <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#included">Features and Functions <i class="pull-right icon-chevron-right"></i></a></li>
				<li><a href="#timecat-next">What's next <i class="pull-right icon-chevron-right"></i></a></li>
			</ul>
		</div>
		<div id="content" class="span6">
			<div class="row-fluid tc-help-header">
				<h1>Using TimeCat 4.0</h1>
				<p>Everything you need to know about using TimeCat 4.0 and its rich features.
				</p>
				<strong>If you are upgrading from TimeCat 3.0 <a>See Here</a> for some changes in TimeCat navigation.</strong>
			</div>
			<br>
			<p class="definition"><span class="label label-info">Note</span> - For a background information about <a href="">Time Motion Studies </a>and <a> TimeCat 4.0 </a>, refer to the <a>Getting Started</a> section.
			<section id="introduction-tms">
				<div class='section-heading'>
					<span class='heading'>1. What's In This Guide </span>
				</div>
				<p>
					We want you to get familiar with using TimeCat 4.0 and to do things with no time, while making use of 
					all <a>components </a> and that are provided for you. One of the major changes in TimeCat 4.0 is the introduction of new User Interface.
					Our main goal was for TimeCat 4.0 to have:<br>
					1. Simplified navigation.<br>
					2. Responsive grid. <a href=""><small><i>what's this?</i></small></a><br>
					3. Fully cross-platform.
				</p>
				<br>
				<p>
					These tutorials describes the basics of using TimeCat 4.0 and getting started quickly.
					These tutorials answers most of the following <a>questions</a>.
				</p>
				<ul class="nav nav-list">
					<li><a>How do I create a TimeCat 4.0 account? </a></li>
					<li><a>Do I need to log in to create a study? </a></li>
					<li><a>What is contained inside a TimeCat 4.0 study? </a></li>
					<li><a>How do I create a TimeCat 4.0 study? </a></li>
					<li><a>Where and when can I define my task list?  </a></li>
					<li><a>What do I need to start observing a subject? </a></li>
					<li><a>What is the best way to do an observation?</a></li>
					<li><a><h4>See more FAQs</h4></a></li>
				</ul>
				<br>
				<p class='definition'><b>Do I need a TimeCat 4.0 account </b> - All the users ...
				</p>
			</section>
			<section id="introduction-timecat">
				<div class='section-heading'>
					<span class='heading'>2. Creating A New Account </span>
				</div>
				<p class='definition'><b>Before Signing Up. </b><br>

				</p>
				<div class="accordion" id="create-1-1">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#create-1-1" href="#collapse-create-1-1">
								Why did I get an invite email from TimeCat 4.0 or a TimeCat 4.0 user?
							</a>
						</div>
						<div id="collapse-create-1-1" class="accordion-body collapse">
							<div class="accordion-inner">
								<p>You have received an invitation because someone on TimeCat 4.0 has created a <a>study</a>
									and wants you to be part of his/her study either as a <a>study administrator</a> or a <a>study observer</a>.
									In order to be part of the study you must have a TimeCat 4.0 Account.
									<br>
									<br>
									If you already have a TimeCat 4.0 account, but you have registered with a different email address,
									you can do one of the following:<br>
									- Discard the email and provide the person who invited you with your existing email.<br>
									- <a>Add this email to your account </a>so that when people invite you in the future, you will not receive email notifications in the future.
								</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#create-1-1" href="#collapse-create-1-2">
								Is it free to use TimeCat 4.0? If yes, will it always be free?
							</a>
						</div>
						<div id="collapse-create-1-2" class="accordion-body collapse">
							<div class="accordion-inner">
								<p>
									TimeCat 4.0 is free to use. .....
								</p>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#create-1-3" href="#collapse-create-1-3">
								Can I use TimeCat 4.0 for other purposes outside Medical Use?
							</a>
						</div>
						<div id="collapse-create-1-3" class="accordion-body collapse">
							<div class="accordion-inner">
								<p>Yes ...</p>
							</div>
						</div>
					</div>
				</div>
				<br>
				<h4>Creating an Account </h4>
				<p class='definition'>Signing up is easy in few steps. To have a new TimeCat 4.0 account,
					enter your name, <a>institution</a>, choose a strong password and read our <a>terms and conditions</a> </p>
				<ul class="thumbnails">
					<h5>TimeCat 4.0 sign up page</h5>
					<li class="span12">
						<div class="thumbnail">
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/help/using_timecat/create_account/sign_up.png" class="pull-left" alt="">
						</div>
					</li>
				</ul>
			</section>
		</div>
		<div class='span3 right-sidebar'>
			<div class='section-heading'>
				<span class='heading'>For the impatient: </span>
			</div>
			<p>Show me how to create a study</p>
		</div>
	</div>
</div> <!-- /container -->

<?php $this->endContent(); ?>

