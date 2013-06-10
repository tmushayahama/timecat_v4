<?php $this->beginContent('//home_layouts/study_layouts/study_main'); ?>
<div class="section-container auto" data-section>
  <section>
    <p class="title" data-section-title><a href="#panel1">Dashboard</a></p>
    <div class="content" data-section-content>
			<div class="large-2 columns">
				<div class="row">
					<?php echo CHtml::link('<i class="foundicon-plus sear" >Begin New Obversation</i>', 'study/study/create', array('class' => 'button expand')); ?>	
				</div>
			</div>	
    </div>
	</section>
	<section>
		<p class="title" data-section-title><a href="#panel3">Observers</a></p>
		<div class="content" data-section-content>
			<p>Content of section 2.</p>
		</div>
	</section>
	<section>
		<p class="title" data-section-title><a href="#panel3">Reports</a></p>
		<div class="content" data-section-content>
			<p>Content of section 2.</p>
		</div>
	</section>
	<section>
		<p class="title" data-section-title><a href="#panel3">Reports</a></p>
		<div class="content" data-section-content>
			<p>Content of section 2.</p>
		</div>
	</section>
</div>
<?php $this->endContent(); ?>
