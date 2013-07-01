<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
	<li><a href="onsestudy.html">Study Home</a></li>
	<li class="current"><a href="observers.html">Observers</a></li>
</ul>
<div class="row">
	<div class="large-7 columns">
		<?php foreach ($observers as $observer): ?>
			<div class="row margibotom">
				<div class="large-11 large-centered columns regordoon blanko sear observer-border" observer-status =<?php echo $observer->status ?>>
					<div class="row">
						<div class="small-2 columns nopadd">
							<img class="left" src="<?php echo Yii::app()->request->baseUrl . '/images/' . $observer->user->profile->avatar_url ?>" alt="avatar" />
						</div>
						<div class="small-10 columns">
							<div class="row minpad">
								<div class="large-12 columns">
									<span class="vnam"><?php echo $observer->user->profile->firstname . " " . $observer->user->profile->lastname ?> </span>
									<span class="round success label right observer-status-name" observer-status =<?php echo $observer->status ?>>active</span>
								</div>
								<div class="large-12 columns">
									<?php echo $observer->user->email ?><br/>
								</div>
							</div>
						</div>
					</div>
					<div class="row observer-bottom celeste" observer-status =<?php echo $observer->status ?>>
						<div class="small-12 columns">
							<a href="#" class="button small secondary nomarg">View details</a>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<div class="large-5 columns">
		<?php echo $this->renderPartial('_form', array('observer' => $model)); ?>
	</div>
</div>

<?php $this->endContent(); ?>