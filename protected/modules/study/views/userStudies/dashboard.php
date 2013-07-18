<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
	<li><a href="onsestudy.html">Study Home</a></li>
	<li class="current"><a href="observers.html">Observers</a></li>
</ul>
<div class="row">
	<div class="large-7 columns">
			<div class="row margibotom">
				<div class="large-11 large-centered columns regordoon blanko sear observer-border" observer-status =0>
					<div class="row">
						<div class="small-2 columns topad">
							<img class="left" src="<?php echo Yii::app()->request->baseUrl . '/images/timecat_avatar.gif' ?>" alt="avatar" />
						</div>
						<div class="small-10 columns">
							<div class="row minpad">
								<div class="large-12 columns">
									<span class="vnam">Tremayne Mushayahama </span>
									<span class="round success label right observer-status-name" observer-status =0>active</span>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<em>Study Creator</em><br/>
										<i class="foundicon-idea"></i> 2 trainings <em>(00h15m22s)</em><br/>
										<i class="foundicon-checkmark"></i> 2 sessions of I.O.R.A.
									</p>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<br/>
										<i class="foundicon-flag"></i> 4 real obs <em>(00h08m14s)</em><br/>
										<i class="foundicon-location"></i> Sites: My Home, The Ohio S...
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row celeste observer-bottom" observer-status =0>
						<div class="small-12 columns">
							<a href="obs_detail.html" class="button small secondary nomarg">View details</a>
						</div>
					</div>
				</div>
			</div>
		<div class="row margibotom">
				<div class="large-11 large-centered columns regordoon blanko sear observer-border" observer-status =1>
					<div class="row">
						<div class="small-2 columns topad">
							<img class="left" src="<?php echo Yii::app()->request->baseUrl . '/images/timecat_avatar.gif' ?>" alt="avatar" />
						</div>
						<div class="small-10 columns">
							<div class="row minpad">
								<div class="large-12 columns">
									<span class="vnam">Po-Yin Yen </span>
									<span class="round success label right observer-status-name" observer-status =1>active</span>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<em>Admin</em><br/>
										<i class="foundicon-idea"></i> 50 trainings <em>(7)</em><br/>
										<i class="foundicon-checkmark"></i> 41 sessions of I.O.R.A.
									</p>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<br/>
										<i class="foundicon-flag"></i> 13 real obs <em>(14h04m07s)</em><br/>
										<i class="foundicon-location"></i> Sites: The Ohio State ...
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row celeste observer-bottom" observer-status =1>
						<div class="small-12 columns">
							<a href="obs_detail.html" class="button small secondary nomarg">View details</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row margibotom">
				<div class="large-11 large-centered columns regordoon blanko sear observer-border" observer-status =1>
					<div class="row">
						<div class="small-2 columns topad">
							<img class="left" src="<?php echo Yii::app()->request->baseUrl . '/images/timecat_avatar.gif' ?>" alt="avatar" />
						</div>
						<div class="small-10 columns">
							<div class="row minpad">
								<div class="large-12 columns">
									<span class="vnam">Philip Payne </span>
									<span class="round success label right observer-status-name" observer-status =1>active</span>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<em>Observer</em><br/>
										<i class="foundicon-idea"></i> 0 trainings <em>(00h00m00s)</em><br/>
										<i class="foundicon-checkmark"></i> 0 sessions of I.O.R.A.
									</p>
								</div>
								<div class="large-6 columns">
									<p class="studydesc">
										<br/>
										<i class="foundicon-flag"></i> 0 real obs <em>(00h00m00s)</em><br/>
										<i class="foundicon-location"></i> Sites: N/A
									</p>
								</div>
							</div>
						</div>
					</div>
					<div class="row celeste observer-bottom" observer-status =1>
						<div class="small-12 columns">
							<a href="obs_detail.html" class="button small secondary nomarg">View details</a>
						</div>
					</div>
				</div>
			</div>
		
	</div>
	<div class="large-5 columns">
		<?php echo $this->renderPartial('_form', array('observer' => $model)); ?>
	</div>
</div>

<?php $this->endContent(); ?>