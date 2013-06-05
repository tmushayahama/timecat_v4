<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//home_layouts/home_main'); ?>
<div class="row">
	<h3>Profile<small> TimeCaT member</small></h3>
</div>	
<div class="row panel">
	<div class="large-3 columns text-center">
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$this->avatar, "avatar",array('alt'=>"profile avatar", "width"=>200, 'height'=>200)); ?>  
	<br/><br/>
		<a href="http://localhost/timecat_v4/index.php/user/avatar/create" class="small button secondary radius"><i class="foundicon-photo sear" ></i> Change avatar</a>
	</div>
	<?php echo $content ?>
</div> 
<?php $this->endContent() ?>