<?php $this->beginContent('//study_layouts/study_nav'); ?>
<ul class="breadcrumbs">
    <?php echo CHtml::link('Study Home', array('/study/study/dashboard/studyId/' . $studyId)); ?>
    <li class="current"><a href="tasks.html">Tasks</a></li>
</ul>	
<div class="row">
    <div class="large-7 columns">
        <div class="section-container tabs" data-section="tabs" style="">
            <?php
            $tabs = array();
            $tabCount = 1;
            $categorized_tasks = array();
            foreach ($task_types as $task_type){
                $categorized_tasks[$task_type->category->type_entry] = array();
            }
            foreach($study_tasks as $task){
                $category = $task->category->type_entry;
//                if(!array_key_exists($category, $categorized_tasks)){
//                    $categorized_tasks[$category] = array();
//                }
                array_push($categorized_tasks[$category], $task);
            }
            foreach ($task_types as $task_type):
                ?>
                <?php
                if (!in_array($task_type->category->type_entry, $tabs)):
                    array_push($tabs, $task_type->category->type_entry);
                    ?>
                    <section class="section active" style="padding-top: 49px;">
                        <p class="title" style="left: 0px;"><a href="<?php echo '#panel' . $tabCount ?>"><?php echo $task_type->category->type_entry ?></a></p>
                        <div class="content" data-slug="<?php echo 'panel' . $tabCount ?>" style="">
                            <?php
                            foreach ($categorized_tasks[$task_type->category->type_entry] as $task):
                                if ($task->category->type_entry == $task_type->category->type_entry):
                                    ?>
                                    <div class="row task-block margibotom" >
                                        <div class="large-11 large-centered columns task-border regordoon blanko sear" task-status="	<?php echo $task->status; ?>">
                                            <div class="row minpad">
                                                <div class="large-12 columns taskid" data-taskid=<?php echo $task->id ?>>
                                                    <span class="taskname vnam"><?php echo $task->name; ?></span>
                                                    <span class="round sucess label right task-status-name bverdon" task-status="	<?php echo $task->status; ?>">active</span>
                                                </div>
                                            </div>
                                            <div class="row minpad">
                                                <div class="large-2 columns">
                                                    <strong>Definition:</strong>
                                                </div>
                                                <div class="large-10 columns taskdefinition">
                                                    <?php echo $task->definition; ?>
                                                </div>
                                            </div>
                                            <div class="row minpad">
                                                <div class="large-2 columns">
                                                    <strong>Starts:</strong>
                                                </div>
                                                <div class="large-10 columns taskstart-action">
                                                    <?php echo $task->start_action; ?>
                                                </div>
                                            </div>
                                            <div class="row minpad">
                                                <div class="large-2 columns">
                                                    <strong>Ends:</strong>
                                                </div>
                                                <div class="large-10 columns taskend-action">
                                                    <?php echo $task->end_action; ?>
                                                </div>
                                            </div>
                                            <div class="row task-bottom celeste" task-status="<?php echo $task->status; ?>">
                                                <div class="small-12 columns">
                                                    <a href="#" class="button small secondary nomarg editers">Edit</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </section>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="large-5 columns">
        <div class="row">
            <div class="large-11 large-centered columns blanko ">
                <div>
                    <div class="row bluerer">
                        <div class="large-12 columns">
                            <h5>Add new task</h5>
                        </div>
                    </div>
                    <div>
                        <?php echo $this->renderPartial('_form', array('tasks_model' => $tasks_model)); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //echo $form->dropDownList($task_model, 'category_id', CHtml::listData($task_types, 'id', 'type_entry')); //$task_types);  ?>
<?php // echo $form->error($task_model, 'category_id');   ?>



<div id="editTask" class="reveal-modal medium">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'study-tasks-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <?php echo $form->errorSummary($tasks_model); ?>
    <input type="hidden" id="taskid" value="">
    <h2>Edit "<span id="tknameti">Name of the task</span>"</h2>
    <div class="row">
        <div class="large-9 large-centered columns celeste inputers">
            <div class="row">
                <div class="large-3 columns">
                    <?php echo $form->labelEx($tasks_model, 'name'); ?>
                </div>
                <div class="large-9 columns">
                    <?php echo $form->textField($tasks_model, 'name', array('id' => 'edit-taskname-field', 'maxlength' => 50)); ?>
                    <?php echo $form->error($tasks_model, 'name'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-9 large-centered columns celeste inputers">
            <div class="row">
                <div class="small-3 columns">
                    <label for="definit2" >Definition</label>
                </div>
                <div class="small-9 columns">
                    <?php echo $form->textArea($tasks_model, 'definition', array('id' => 'edit-taskdefinition-field', 'rows' => 6, 'maxlength' => 255)); ?>
                    <?php echo $form->error($tasks_model, 'definition'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-9 large-centered columns celeste inputers">
            <div class="row">
                <div class="large-3 columns">
                    <?php echo $form->labelEx($tasks_model, 'start_action'); ?>
                </div>
                <div class="large-9 columns">
                    <?php echo $form->textField($tasks_model, 'start_action', array('id' => 'edit-taskstart-action-field', 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($tasks_model, 'start_action'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-9 large-centered columns celeste inputers">
            <div class="row">
                <div class="large-3 columns">
                    <?php echo $form->labelEx($tasks_model, 'end_action'); ?>
                </div>
                <div class="large-9 columns">
                    <?php echo $form->textField($tasks_model, 'end_action', array('id' => 'edit-taskend-action-field', 'size' => 60, 'maxlength' => 255)); ?>
                    <?php echo $form->error($tasks_model, 'end_action'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="large-9 large-centered columns celeste inputers">
            <div class="row">
                <div class="large-3 columns">
                    <label>Status</label>
                </div>
                <div class="large-9 columns">
                    <div class="small-6 columns">
                        <input name="statuse" type="radio" id="active" CHECKED><label class="radlabel" for="active">Active</label>
                    </div>

                    <div class="small-6 columns">
                        <input name="statuse" type="radio" id="inactive"> <label class="radlabel" for="inactive">Inactive</label>
                    </div>

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
<?php $this->endWidget(); ?>
<?php $this->endContent(); ?>
