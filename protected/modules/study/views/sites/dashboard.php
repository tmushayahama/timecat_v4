<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
    <?php echo CHtml::link('Study Home', array('/study/study/dashboard/studyid/' . $studyId)); ?>
    <li class="current">Sites</li>
</ul>	
<div class="row">
    <div class="large-7 columns">
        <?php $study_counter = 0; ?>
        <?php foreach ($study_sites as $site): ?>
            <div class="row margibotom">
                <div class="large-11 large-centered columns regordoon blanko sear">
                    <div class="row minpad">
                        <div class="large-12 columns stid" data-stid="1">
                            <span class="vnam sitename"><?php echo $site->name ?></span>
                            <span class="round success label right">active</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="small-10 columns">
                            <div class="row minpad">
                                <div class="large-3 columns">
                                    <strong>Time-Zone:</strong>
                                </div>
                                <div class="large-9 columns vdef" data-thetmz="America/Anchorage">
                                    <?php echo Sites::$timezoneMap[$site->timezone]; date_default_timezone_set("$site->timezone");?>
                                </div>
                            </div>
                            <div class="row minpad">
                                <div class="large-3 columns">
                                    <strong>Current Time:</strong>
                                </div>
                                <div class="large-9 columns vstars clocks" data-timer="false">
                                    <span class="hors"><?php echo date("H") ?></span>:<span class="mins"><?php echo date("i") ?></span>:<span class="secs"><?php echo date("s") ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="small-2 columns">
                            <img src="<?php echo Yii::app()->request->baseUrl . '/img/site'.($study_counter + 1).'.png' ?>" alt="site icon" />
                        </div>
                    </div>
                    <div class="row celeste">
                        <div class="small-12 columns">
                            <a href="#" class="button small secondary nomarg editers aron_sites">Edit</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php $study_counter = ($study_counter + 1)%6; ?>
        <?php endforeach ?>
    </div>
    <div class="large-5 columns">
        <?php
        echo $this->renderPartial('_form', array('sites_model' => $sites_model,
            'sites_timezones' => $sites_timezones));
        ?>
    </div>
</div>
<div id="edit-sites-modal" class="reveal-modal medium">
    <h2>Edit Site.</h2>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'sites-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <div class="row">
        <div class="large-9 large-centered columns celeste inputers">
            <div class="row">
                <div class="large-3 columns">
                    <?php echo $form->labelEx($sites_model, 'name'); ?>
                </div>
                <div class="large-9 columns">
                    <?php echo $form->textField($sites_model, 'name', array('id' => 'edit-sitename-field', 'maxlength' => 50)); ?>
                    <?php echo $form->error($sites_model, 'name'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-9 large-centered columns celeste inputers">
            <div class="row">
                <div class="large-3 columns">
                    <?php echo $form->labelEx($sites_model, 'timezone'); ?>
                </div>
                <div class="large-9 columns">
                    <?php echo $form->dropDownList($sites_model, 'timezone', CHtml::listData($sites_timezones, 'name', 'name')); //$sites_types); ?>
                    <?php echo $form->error($sites_model, 'timezone'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
    <div class="row">
        <div class="small-12 columns text-right">
            <?php
            echo CHtml::tag('button', array('name' => 'update', 'class' => 'button'), 'Save Changes');
            ?>
        </div>
    </div>
    <a class="close-reveal-modal">&#215;</a>
    <?php $this->endWidget(); ?>
</div>
<?php $this->endContent(); ?>
