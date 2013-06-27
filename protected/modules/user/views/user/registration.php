<?php
$this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Registration");
$this->breadcrumbs = array(
		UserModule::t("Registration"),
);
?>
<?php if (Yii::app()->user->hasFlash('registration')): ?>
	<div class="success">
		<?php
		echo Yii::app()->user->getFlash('registration');
		echo $temp;
		?>
	</div>
<?php else: ?>
	<div class="form">
		<?php
		$form = $this->beginWidget('UActiveForm', array(
				'id' => 'registration-form',
				'enableAjaxValidation' => true,
				//'disableAjaxValidationAttributes' => array('RegistrationForm_verifyCode'),
				'clientOptions' => array(
						'validateOnSubmit' => true,
				),
				'htmlOptions' => array('enctype' => 'multipart/form-data'),
		));
		?>

		<div class="row bluerer masabajo">
			<div class="large-12 columns">
				<h3>Create Account:</h3>
			</div>
		</div>
		<?php echo $form->errorSummary(array($model, $profile)); ?>

		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<div class="small-3 columns">
						<?php echo $form->labelEx($model, 'email', array('class' => 'right')); ?>
					</div>
					<div class="small-9 columns">
						<?php echo $form->textField($model, 'email', array('placeholder' => 'username@email.com')); ?>
						<?php echo $form->error($model, 'email'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<div class="small-3 columns">
						<?php echo CHtml::activeLabelEx($model, 'password', array('class' => 'right')); ?>
					</div>
					<div class="small-9 columns">
						<?php echo CHtml::activePasswordField($model, 'password', array('placeholder' => 'password')); ?>
						<?php echo $form->error($model, 'password'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<div class="small-3 columns">
						<?php echo CHtml::activeLabelEx($model, 'verifyPassword', array('class' => 'right')); ?>
					</div>
					<div class="small-9 columns">
						<?php echo CHtml::activePasswordField($model, 'verifyPassword', array('placeholder' => 'password')); ?>
						<?php echo $form->error($model, 'verifyPassword'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row bluerer masabajo">
			<div class="large-12 columns">
				<h3>Contact Information:</h3>
			</div>
		</div>
		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<div class="small-3 columns">
						<?php echo $form->labelEx($profile, 'firstname', array('class' => 'right')); ?>
					</div>
					<div class="small-9 columns">
						<?php echo $form->textField($profile, 'firstname', array('placeholder' => 'Your First Name')); ?>
						<?php echo $form->error($profile, 'firstname'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<div class="small-3 columns">
						<?php echo $form->labelEx($profile, 'lastname', array('class' => 'right')); ?>
					</div>
					<div class="small-9 columns">
						<?php echo $form->textField($profile, 'lastname', array('placeholder' => 'Your Last Name')); ?>
						<?php echo $form->error($profile, 'lastname'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<div class="small-3 columns">
						<?php echo $form->labelEx($profile, 'institution', array('class' => 'right')); ?>
					</div>
					<div class="small-9 columns">
						<?php echo $form->textField($profile, 'institution', array('placeholder' => 'The Ohio State University')); ?>
						<?php echo $form->error($profile, 'institution'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row bluerer masabajo">
			<div class="large-12 columns">
				<h3>User Agreement:</h3>
			</div>
		</div>


		<div class="row">
			<div class="large-9 large-centered columns celeste inputers">
				<div class="row">
					<textarea class="large-12 columns minalto" readonly="readonly">END USER AGREEMENT
										--------------------------------------------- 
										The Department of Biomedical Informatics at the Ohio State University hereby gives you a non-exclusive license to use the software Time Capture Tool (TimeCaT). 
										For Research and Educational Purposes, the license is granted, and is valid for Six Time Motion Studies. No Licenses available for commercial purposes. Proof of relation to educational institution is required by providing an institutional e-mail account during the registration process.  
										 You may:  
										- Access the web application from any internet enabled computer via a web browser at www.timecat.org;  
										- Create a maximum of 20 secondary accounts for observers/users collaborating in your project;  
										- Download your study data as a CSV file.  
										 
										You may not:  
										- Rent, lease, transfer or otherwise transfer rights to the Software;  
										- Modify, translate, reverse engineer or decompile the Software.
										- Remove any proprietary notices or labels on the Software while using or during public presentations.  
										 
										The license will terminate automatically if you fail to comply with the limitations described above. On termination, you will receive a copy of your data in a CSV file by e-mail, and your credentials will no longer grant access to the application.
										 
										INTELLECTUAL PROPERTY
										--------------------------------------------- 
										The data captured with TimeCaT is intellectual property of the end user. However, the Department of Biomedical Informatics reserves the right to use the data in a de-identified manner for software improvement purposes, as well as for abstract research regarding the development of an inter-observer reliability assessment scoring system, and the construction of a web based ontology of tasks used by different investigators in their research projects.

										DISCLAIMER OF WARRANTY  
										--------------------------------------------- 
										This Software is provided on an AS IS basis, without warranty of any kind. The entire risk as to the quality and performance of the Software is borne by you. Should the Software prove defective, you and not The Ohio State University assume the entire cost of any service and repair. 
										 THE DEPARTMENT OF BIOMEDICAL INFORMATICS AT THE OHIO STATE UNIVERSITY IS NOT RESPONSIBLE FOR ANY INDIRECT, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES OF ANY CHARACTER INCLUDING, WITHOUT LIMITATION, DAMAGES FOR LOSS OF GOODWILL, WORK STOPPAGE, COMPUTER FAILURE OR MALFUNCTION, OR ANY AND ALL OTHER COMMERCIAL DAMAGES OR LOSSES.  
										 

					</textarea>
				</div>
				<div class="row">
					<div class="small-12 columns text-right">
						<label for="checkbox1">
							<?php echo $form->checkBox($model, 'agreement', array('value' => 1, 'uncheckValue' => 0)); ?>
							I Accept the terms.
						</label>
						<?php echo $form->error($model, 'agreement'); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="large-9 large-centered columns">

				<div class="small-12 columns text-right">
					<?php echo CHtml::submitButton(UserModule::t("Register"), array('class' => 'button')); ?>
				</div>
			</div>
		</div>
		<?php $this->endWidget(); ?>
	</div><!-- form -->
<?php endif; ?>