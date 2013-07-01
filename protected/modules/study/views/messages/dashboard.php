<?php $this->beginContent('//study_layouts/study_nav'); ?>
<?php echo CHtml::link('Compose', '', array('data-reveal-id' => 'create-message-modal', 'class' => 'medium button radius entrar')); ?>
<?php foreach ($messages as $message) : ?>
	<div class="row margibotom">
		<div class="large-11 large-centered columns regordoon blanko sear">
			<div class="row minpad">
				<div class="large-12 columns stid" data-stid="1">
					<span class="vnam"><?php echo $message->subject ?></span>
					<span class="round success label right">active</span>
				</div>
			</div>
		</div>
	</div>
<?php endforeach; ?>
<div id="create-message-modal" class="reveal-modal medium">
	<?php echo $this->renderPartial('_form', array('model' => $message_model)); ?>
	<a class="close-reveal-modal">&#215;</a>
</div>
<?php $this->endContent(); ?>


