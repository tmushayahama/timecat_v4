<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
    <?php echo CHtml::link('Study Home', array('/study/study/dashboard/studyid/' . $studyid)); ?>
    <li class="current">Observers</li>
</ul>
<div class="row">
    <div class="large-7 columns">
        <?php foreach ($observers as $observer): ?>
            <div class="row margibotom">
                <div class="large-11 large-centered columns regordoon blanko sear observer-border" observer-status =<?php echo $observer->status ?>>
                    <div class="row">
                        <div class="small-2 columns topad">
                            <img class="left" src="<?php echo Yii::app()->request->baseUrl . '/images/' . $observer->user->profile->avatar_url ?>" alt="avatar" />
                        </div>
                        <div class="small-10 columns">
                            <div class="row minpad">
                                <div class="large-12 columns">
                                    <span class="vnam"><?php echo $observer->user->profile->firstname . " " . $observer->user->profile->lastname ?> </span>
                                    <span class="round label right observer-status-name" observer-status =<?php echo $observer->status ?>> loading status... </span>
                                </div>
                                <div class="large-6 columns">
                                    <p class="studydesc">
                                        <em><?php echo $observer->role->type_entry; ?></em><br/>
                                        <i class="foundicon-idea"></i> 37 trainings <em>(35h15m22s)</em><br/>
                                        <i class="foundicon-checkmark"></i> 2 sessions of I.O.R.A.
                                    </p>
                                </div>
                                <div class="large-6 columns">
                                    <p class="studydesc">
                                        <br/>
                                        <i class="foundicon-flag"></i> 14 real obs <em>(22h08m14s)</em><br/>
                                        <i class="foundicon-location"></i> Sites: Hospital 1, Hopsital B
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row celeste observer-bottom" observer-status =<?php echo $observer->status ?>>
                        <div class="small-12 columns">
                            <a href="obs_detail.html" class="button small secondary nomarg">View details</a>
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