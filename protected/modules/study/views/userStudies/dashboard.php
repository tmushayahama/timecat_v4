<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
	<li><a href="onsestudy.html">Study Home</a></li>
	<li class="current"><a href="observers.html">Observers</a></li>
</ul>
<div class="row">
	<div class="large-7 columns">
		<div class="row margibotom">
			<div class="large-11 large-centered columns regordoon blanko sear">
				<div class="row">
					<div class="small-2 columns nopadd">
						<img class="left" src="img/defaultuser.gif" alt="avatar" />
					</div>
					<div class="small-10 columns">
						<div class="row minpad">
							<div class="large-12 columns">
								<span class="vnam">Name LastName</span>
								<span class="round success label right">active</span>
							</div>
							<div class="large-12 columns">
								username@email.com<br/>
							</div>
						</div>
					</div>
				</div>
				<div class="row celeste">
					<div class="small-12 columns">
						<a href="#" class="button small secondary nomarg">View details</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->renderPartial('_form', array('observer' => $model)); ?>
</div>
<?php $this->endContent(); ?>