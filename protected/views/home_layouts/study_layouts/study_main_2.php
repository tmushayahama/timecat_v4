<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/tc_main'); ?>
<div id="wrap" class="blangradient">

	<nav class="top-bar bluerer">
		<ul class="title-area">
			<li id="gato" class="name"><h1><a class="sinmenu eliseo" href="onestudy.php">"Medication administration in the I.C.U."</a></h1></li>
			<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="right">
				<li><a class="masgris " href="load.php">Change study</a></li>
				<li class="has-form bluerer"><a href="index.php" class="button alert">Logout</a></li>
			</ul>
		</section>
	</nav>
	<div id="main">
		<div class="row">
			<div class="tc_modal large-12 large-centered columns blanko elogin">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</div>
<?php $this->endContent() ?>