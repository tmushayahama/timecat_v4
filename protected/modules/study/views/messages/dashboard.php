<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
    <?php echo CHtml::link('Study Home', array('/study/study/dashboard/studyid/' . $studyid)); ?>
    <li class="current">Messages</li>
</ul>

<div class="row">
    <div class="row">
        <?php echo CHtml::link('Compose', '', array('data-reveal-id' => 'create-message-modal', 'class' => 'button')); ?>
    </div>
    <div class="large-5 columns">
        <?php foreach ($messages as $message) : ?>
            <div class="row margibotom">
                <div class="large-11 large-centered columns regordoon blanko sear">
                    <div class="row minpad">
                        <div class="large-12 columns tkid" data-tkid="3">
                            <span class="vnam"><?php echo 'To: ' . $message_meta_data[$message->message_id]['recipient'] ?></span>
                            <?php if (!$message_meta_data[$message->message_id]['sent_by_user'] && !$message->received): ?>
                                <span class="round label brojo right">unread</span>
                            <?php endif; ?>
                        </div>
                        <div class="large-1 columns">
                        </div>
                        <div class="large-12 columns tkid" data-tkid="3">
                            <span class="vnam"><?php echo 'From: ' . $message_meta_data[$message->message_id]['sender'] ?></span>
                        </div>
                        <div class="large-1 columns">
                        </div>
                        <div class="large-12 columns tkid" data-tkid="3">
                            <span class="vnam"><?php echo $message->message->subject ?></span>
                        </div>
                    </div>

                    <div class="row minpad">
                        <div class="large-1 columns">
                        </div>
                        <div class="large-11 columns vdef">
                            <?php echo $message->message->body ?>
                        </div>
                    </div>
                    <div class="row celeste">
                        <div class="small-12 columns">
                            <?php echo CHtml::link('View', Yii::app()->baseUrl . '/study/messages/index/studyid/' . $message->study_id . '/messageid/' . $message->message->id, array('class' => 'button small ')); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="large-7 columns">
        <?php if ($selected_message != false) echo $selected_message->body; ?>
    </div>
</div>
<div id="create-message-modal" class="reveal-modal medium">
    <?php echo $this->renderPartial('_form', array('model' => $message_model)); ?>
    <a class="close-reveal-modal">&#215;</a>
</div>
<?php $this->endContent(); ?>

