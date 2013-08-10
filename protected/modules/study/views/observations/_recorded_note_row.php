<?php
/* @var $this ObservationsController */
/* @var $model Observations */
/* @var $form CActiveForm */
?>
<div class="onenote">
	<p class="oblog">
		<?php
		$note_time->setTimeZone(new DateTimeZone($site_timezone));
		?>
		<span class="notetime"><?php echo $note_time->format("H:i:s"); ?></span> - 
		<span class="notetype"><?php echo $type; ?>
		</span>
		<br/>
		<em><span class="oblog notexts"><?php echo $note; ?></span></em></p>
</div>