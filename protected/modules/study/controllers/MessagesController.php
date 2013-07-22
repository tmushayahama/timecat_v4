<?php

class MessagesController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Messages;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Messages'])) {
            $model->attributes = $_POST['Messages'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Messages'])) {
            $model->attributes = $_POST['Messages'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex($studyid, $messageid) {
        $messageModel = new Messages;
        //$userMessagesModel = new UserMessages;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Messages'])) {
            $messageModel->attributes = $_POST['Messages'];
            //$userMessageModel->attributes = $_POST['UserMessages'];
            $messageModel->save();

            $messageCriteria = new CDbCriteria;
            $messageCriteria->condition = "email='" . $this->escapeArroba($messageModel->email) . "'";

            $userMessageModel = new UserMessages;
            $userMessageModel->message_id = $messageModel->id;
            $userMessageModel->sender_id = Yii::app()->user->id;
            $userMessageModel->recipient_id = User::Model()->find($messageCriteria)->id;
            $userMessageModel->study_id = $studyid;
//            $userMessageModel->send_date = date('Y-m-d h:m:s');
            $sendDate = new DateTime("now");
            $userMessageModel->send_date = $sendDate->format('Y-m-d H:i:s');
            $userMessageModel->save(false);
        }

        $unsortedMessages = UserMessages::Model()->findAll('study_id='.$studyid.' AND (recipient_id='.Yii::app()->user->id.' OR sender_id='.Yii::app()->user->id.')');
        $messages = array();
        $messageMetaData = array();
        foreach($unsortedMessages as $message){
            $messages[$message->send_date] = $message;
            $messageMetaData[$message->message_id] = array(
                'recipient' => User::Model()->findByPk($message->recipient_id)->email,
                'sender' => User::Model()->findByPk($message->sender_id)->email,
                'sent_by_user' => $message->sender_id == Yii::app()->user->id,
            );
        }
        krsort($messages);
        $this->render('dashboard', array(
            'message_model' => $messageModel,
//            'messages' => UserMessages::Model()->findAll($studyId = 'study_id' && (Yii::app()->user->id = 'recipient_id' || Yii::app()->user->id = 'sender_id')),
            'messages' => $messages,
            'message_meta_data' => $messageMetaData,
            'selected_message' => $messageid == 0 ? false : $this->loadModel($messageid),
            'studyid'=>$studyid,
        ));
        
    }

    public function escapeArroba($email) {
        /* @var $email string */
        $escaped = substr($email, 0, strpos($email, '@')) . "\@" . substr($email, strpos($email, '@') + 1);
        return $escaped;
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Messages('search');
        $model->unsetAttributes(); // clear any default values
        if (isset($_GET['Messages']))
            $model->attributes = $_GET['Messages'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Messages the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Messages::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Messages $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'messages-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}