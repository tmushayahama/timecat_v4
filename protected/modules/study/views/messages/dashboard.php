<?php $this->beginContent('//study_layouts/study_nav'); ?>
<?php echo CHtml::link('Compose', '', array('data-reveal-id' => 'create-message-modal', 'class' => 'medium button radius entrar')); ?>
<div class="row">
    <div class="large-5 columns">
        <?php foreach ($messages as $userMessage) : ?>
            <div class="row margibotom">
                <div class="large-11 large-centered columns regordoon blanko sear">
                    <div class="row minpad">
                        <div class="large-12 columns tkid" data-tkid="3">
                            <span class="vnam">
                                <?php
                                $message = Messages::Model()->findByPk($userMessage->message_id);
                                echo "From: ".($userMessage->recipient_id)."\nRE: ".($message->subject);
                                ?>
                            </span>
                            <span class="round label brojo right">unread</span>
                        </div>
                    </div>

                    <div class="row minpad">
                        <div class="large-1 columns">
                        </div>
                        <div class="large-11 columns vdef">
                            <?php echo $message->body; ?>
                        </div>
                    </div>
                    <div class="row celeste">
                        <div class="small-12 columns">
                            <?php echo CHtml::link('View', Yii::app()->baseUrl . '/study/messages/index/messageId/' . $message->id, array('class' => 'button small ')); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="large-7 columns">
        <?php echo $selected_message->body; 
        echo "\n Line Break \n";
        //echo $_POST['User']['email'];
        echo $usersModel->find($_POST['User']['email'] = 'email');
        echo "\n Line Break \n";
        ?>
    </div>
</div>
<div id="create-message-modal" class="reveal-modal medium">
    <?php echo $this->renderPartial('_form', array('messagesModel' => $messagesModel, 'userMessagesModel' => $userMessagesModel, 'usersModel' => $usersModel,)); ?>
    <a class="close-reveal-modal">&#215;</a>
</div>
<?php $this->endContent(); ?>