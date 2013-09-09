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
<ul id="help-sidebar" class="nav nav-pills nav-stacked">
	<li><a href="#introduction">Introduction <i class="pull-right icon-chevron-right"></i></a></li>
	<li><a href="#creating-account">Creating An Account <i class="pull-right icon-chevron-right"></i></a></li>
	<li><a href="#login-account">Logging In <i class="pull-right icon-chevron-right"></i></a></li>
	<li><a href="#home">Home Setup<i class="pull-right icon-chevron-right"></i></a></li>
</ul>
<div id="main-container" class="tc-help-container container-fluid">
	<div class="row-fluid">
		<div id="content" class="span8">
			<div class="row-fluid tc-help-header">
				<h1>Using TimeCat 4.0</h1>
				<p>Everything you need to know about using TimeCat 4.0 and its rich features.
				</p>
				<strong>If you are upgrading from TimeCat 3.0 <a>See Here</a> for some changes in TimeCat navigation.</strong>
			</div>
			<br>
			<p class="definition"><span class="label label-info">Note</span> - For a background information about <a href="">Time Motion Studies </a>and <a> TimeCat 4.0 </a>, refer to the <a>Getting Started</a> section.
			<section id="introduction">
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
			<section id="creating-account">
				<div class='section-heading'>
					<span class='heading'>2. Creating A New Account </span>
				</div>
				<h4>Before Signing Up</h4>
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
				<h4>Signing Up</h4>

				<p class='definition'>Signing up is easy in few steps. To have a new TimeCat 4.0 account,
					enter your name, <a>institution</a>, choose a strong password and read our <a>terms and conditions</a> </p>

				<ul class="thumbnails">
					<li class="span12">
						<div class="thumbnail row-fluid">
							<h5>Sign up page</h5>
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/help/using_timecat/create_account/sign_up.png" class="pull-left" alt="">
						</div>
					</li>
				</ul>
				<p class="tc-help-steps">
					<b>Step 1</b>: Enter your name, <a>institution </a> and pick a good password.<br>
					<b>Step 2</b>: Read and agree to the <a>Terms and Condition</a> of using TimeCat 4.0 <br>
					<b>Step 3</b>: Click Sign Up
				</p>
				<br>
				<p class="definition">A confirmation email will be sent upon successful sign 
					up</p>
				<p class="tc-help-steps">
					<b>Step 4</b>: Click the link in the email and you are one step away of using TimeCat 4.0<br>
					<b>Step 5</b>: <a>Login</a> TimeCat 4.0 <br>
				</p>
				<br>
				<h4>Error Messages - Signing Up</h4>
				<div class="">
					<div class="accordion" id="error-1">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#error-1" href="#collapse-error-1-1">
									One of the required field is blank or not filled correctly.
								</a>
							</div>
							<div id="collapse-error-1-1" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><a>View</a> which fields are required to completely sign up.</p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#error-1" href="#collapse-error-1-2">
									Someone has signed up using the email but not yet confirmed
								</a>
							</div>
							<div id="collapse-error-1-2" class="accordion-body collapse">
								<div class="accordion-inner">
									<p>
										Check your email to see if a verification email has been sent to you.
									</p>
								</div>
							</div>
						</div>
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#error-1" href="#collapse-error-1-3">
									Email you have provided is taken or someone is using it.
								</a>
							</div>
							<div id="collapse-error-1-3" class="accordion-body collapse">
								<div class="accordion-inner">
									<p>Each user email must be unique. Sign up with a different email address.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="login-account">
				<div class='section-heading'>
					<span class='heading'>3. Logging In </span>
				</div>
				<h4>Before Logging In</h4>
				<div class="accordion" id="logging-in-1-1">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#loggin-ing-1-1" href="#collapse-loggin-in-1-1">
								Can I login without verifying my account?
							</a>
						</div>
						<div id="collapse-loggin-in-1-1" class="accordion-body collapse">
							<div class="accordion-inner">
								<p>No,  <br>
								</p>
							</div>
						</div>
					</div>
				</div>
				<br>
				<h4>logging In</h4>

				<p class='definition'>
					If you have confirmed your email address, to login, you just 
					need to provide your email and your password. If your have <a> forgot your password </a>, see the details on how to reset it.
				</p>

				<ul class="thumbnails">
					<li class="span12">
						<div class="thumbnail row-fluid">
							<h5>Login page</h5>
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/help/using_timecat/logging_in/login.png" class="pull-left" alt="">
						</div>
					</li>
				</ul>
				<p class="tc-help-steps">
					<b>Step 1</b>: Enter your email and your password.<br>
					<b>Step 3</b>: Click Log In Button
				</p>
				<br>
				<p class="definition">Congratulations!! You are ready to go and experience TimeCat 4.0 and its rich features.
				</p>

				<br>
				<h4>Error Messages - Logging In</h4>
				<div class="">
					<div class="accordion" id="error-2">
						<div class="accordion-group">
							<div class="accordion-heading">
								<a class="accordion-toggle" data-toggle="collapse" data-parent="#error-2" href="#collapse-error-2-1">
									One of the required field is blank or not filled correctly.
								</a>
							</div>
							<div id="collapse-error-2-1" class="accordion-body collapse">
								<div class="accordion-inner">
									<p><a>View</a> which fields are required to completely sign up.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section id="home">
				<div class='section-heading'>
					<span class='heading'>4. Getting Familiar with your Home Page </span>
				</div>
				<p class='definition'>
					When you have successfully logged in and new to TimeCat 4.0, you will have no studies created. However 
					if have been invited to another study your initial home page will have that particular study in the <a>studies area</a>.	
				</p>
				<h4>Your Initial Home Page</h4>
				<ul class="thumbnails">
					<li class="span12">
						<div class="thumbnail row-fluid">
							<h5>Home Page(new user)</h5>
							<img src="<?php echo Yii::app()->request->baseUrl; ?>/img/help/using_timecat/home/home_init.png" class="pull-left" alt="">
						</div>
					</li>
				</ul>
				<p class="tc-help-steps">
					<b>1. Navbar </b>: Contains all global details. It will be helpful when you are <a>navigation in a study</a><br>
					<b>2. Studies Panel</b>: This is where your studies will be.<br>
					<b>3. Create Study Panel</b>: <a>Create new study</a> button.<br>
					<b>4. Profile Panel</b>: We want to know who you are. You can prettify and <a> manage your profile</a> by a adding 
					an <a>avatar</a> and changing your details.
				</p>
			</section>
		</div>
		<div id="right-sidebar" class='row-fluid span4 '>
			<div class='section-heading'>
				<span class='heading'>For the impatient: </span>
			</div>
			<p>1. <b>Create</b> an Account and <b>Login<br>
				2. Your home page will have your profile details and studies panel.<br>
				3. <b>Click</b> "create study" button and create your desired study.<br>
				4. In <b>study panel</b> a new study has been created for you with the initial summary description.
			</p>
		</div>
	</div>
</div> <!-- /container -->

<?php $this->endContent(); ?>

