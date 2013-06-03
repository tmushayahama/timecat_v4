<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>



<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>



<div class="form">
<?php echo CHtml::beginForm(); ?>

	
	<?php echo CHtml::errorSummary($model); ?>
	<div class="row">
            <div class="large-9 large-centered columns celeste inputers">
              <div class="row">
                <div class="small-3 columns">
                   <?php echo CHtml::activeLabelEx($model,'username', array('class'=>'right')); ?>
                  
                </div>
                <div class="small-9 columns">
                   <?php echo CHtml::activeTextField($model,'username', array('placeholder'=>'username@email.com')); ?>
                  
                </div>
              </div>
            </div>
          </div>
        <div class="row">
            <div class="large-9 large-centered columns celeste inputers">
              <div class="row">
                <div class="small-3 columns">
                   <?php echo CHtml::activeLabelEx($model,'password', array('class'=>'right')); ?>
                  
                </div>
                <div class="small-9 columns">
                   <?php echo CHtml::activePasswordField($model,'password', array('placeholder'=>'password')); ?>
                  
                </div>
              </div>
            </div>
          </div>
	
	 <div class="row">
                <div class="large-9 large-centered columns">
                            <div class="row">
                                    <div class="small-6 columns">
                                            <p><?php echo CHtml::link(UserModule::t("Forgot your password?"),Yii::app()->getModule('user')->recoveryUrl); ?></p>
                                    </div>
                                    <div class="small-6 columns text-right">
                                            <?php echo CHtml::submitButton(UserModule::t("Login"), array('class'=>'button')); ?>
                                    </div>
                            </div>

                    </div>
            </div>
	
	
	<!-- <div class="row rememberMe">
		<?php // echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php //echo CHtml::activeLabelEx($model,'rememberMe'); ?>
	</div> -->
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>