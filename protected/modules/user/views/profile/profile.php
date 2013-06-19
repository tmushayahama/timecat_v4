<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//home_layouts/profile'); ?>
<?php $this->pageTitle = Yii::app()->name . ' - ' . UserModule::t("Profile");
?>

<?php if (Yii::app()->user->hasFlash('profileMessage')): ?>
	<div class="success">
		<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
	</div>
<?php endif; ?>
<div class="large-4 columns">
	<div class="row">
		<h3><small>Account Information</small></h3>
	</div>	
	<div class="row">
		<div class="large-12 columns">
			<p><strong>User:</strong> <?php echo Yii::app()->user->email; ?></p>
			<p><strong>Password:</strong> **************</p>
			<p>
				<?php echo CHtml::link('<i class="foundicon-lock sear" >Change Password</i>', 'recovery/changepassword', array('data-reveal-id' => 'myModal', 'class' => 'small button secondary radius')); ?>

			</p>
		</div>
	</div>

</div>
<div class="large-5 columns">
	<div class="row">
		<h3><small>User Details</small></h3>
	</div>
	<div class="row">
		<div class="large-12 columns">
			<p><strong>First name:</strong> <?php echo Yii::app()->user->firstname; ?></p>
			<p><strong>Last name:</strong> <?php echo Yii::app()->user->lastname; ?></p>
			<p><strong>Institution:</strong> The Ohio State University</p>
			<p>
				<?php echo CHtml::link('<i class="foundicon-edit sear" >Edit Details</i>', 'profile/edit', array('data-reveal-id' => 'myModal2', 'class' => 'small button secondary radius')); ?>
			</p>
		</div>
	</div>			
</div>
<div id="myModal" class="reveal-modal medium">
  <h2>Change Password.</h2>
			<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="oldpass" >Old</label>
					</div>
					<div class="large-9 columns">
					  <input type="password" id="oldpass" placeholder="Old Password">
					</div>
				  </div>
				</div>
			  </div>
			<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="password" >New</label>
					</div>
					<div class="large-9 columns">
					  <input type="password" id="password" placeholder="New Password">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="password2" >Confirm</label>
					</div>
					<div class="large-9 columns">
					  <input type="password" id="password2" placeholder="Repeat New Password">
					</div>
				  </div>
				</div>
			  </div>
			  <div class="row">
			  <div class="small-12 columns text-right">
								<a href="#" class="button ">Change Password</a>
							</div>
			  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>
<div id="myModal2" class="reveal-modal medium">
  <h2>Edit details.</h2>
			<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="firstname" >First Name</label>
					</div>
					<div class="large-9 columns">
					  <input type="text" id="firstname" value="Josie">
					</div>
				  </div>
				</div>
			  </div>
				 <div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="lastname" >Last Name</label>
					</div>
					<div class="large-9 columns">
					  <input type="text" id="lastname" value="Fine">
					</div>
				  </div>
				</div>
			  </div>
				<div class="row">
				<div class="large-9 large-centered columns celeste inputers">
				  <div class="row">
					<div class="large-3 columns">
					  <label for="institution" >Institution</label>
					</div>
					<div class="large-9 columns">
					  <input type="text" id="institution" value="The Ohio State University">
					</div>
				  </div>
				</div>
			  </div>
			
			  <div class="row">
			  <div class="small-12 columns text-right">
								<a href="#" class="button ">Save changes</a>
							</div>
			  </div>
  <a class="close-reveal-modal">&#215;</a>
</div>
<?php $this->endContent() ?>