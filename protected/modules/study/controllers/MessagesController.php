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
        $messagesModel = new Messages;
        $userMessagesModel = new UserMessages;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Messages'])) {
            $messagesModel->attributes = $_POST['Messages'];
            if ($messagesModel->save())
                $this->redirect(array('view', 'id' => $messagesModel->id));

            $userMessagesModel->attributes = $_POST['UserMessages'];
            if ($userMessagesModel->save())
                $this->redirect(array('view', 'id' => $userMessagesModel->id));
        }

//        if (isset($_POST['User_Messages'])) {
//            $userMessagesModel->attributes = $_POST['User_Messages'];
//            if ($userMessagesModel->save())
//                $this->redirect(array('view', 'id' => $userMessagesModel->id));
//        }

        $this->render('create', array(
            'messagesModel' => $messagesModel,
            'userMessagesModel' => $userMessagesModel,
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
    public function actionIndex($studyId, $userId, $messageId) {
        $messagesModel = new Messages;
        $userMessagesModel = new UserMessages;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Messages'])) {
            $messagesModel->attributes = $_POST['Messages'];
            $messagesModel->save();            
            //$userMessagesModel->attributes = $_POST['UserMessages'];
            //echo $messagesModel->subject;
//            echo User::Model()->find("email='".$userMessagesModel->email."'");
            //$recipient = User::Model()->find($userMessageModel->email = 'email');
            $recipient = User::Model()->find("email='".$userMessagesModel->email."'");
            $userMessagesModel->attributes['recipient_id'] = $recipient->attributes['id'];
            $userMessagesModel->attributes['message_id'] = $messagesModel->id;
            $userMessagesModel->attributes['study_id'] = $studyId;
            $userMessagesModel->attributes['sender_id'] = Yii::app()->user->id;
            $userMessagesModel->attributes['send_date'] = date('Y-M-D h:m:s');
            $userMessagesModel->save();
        }

//        $userMesssagesArr = UserMessages::Model()->findAll($studyId = 'study_id');
//        $messagesArr = array();
//        foreach($userMesssagesArr as $element){
//            
//        }
//        UserMessages::Model()->findAll($studyId = 'study_id' && ($accountId = 'sender_id' || $accountId = 'recipient_id'));
        $this->render('dashboard', array(
            'messagesModel' => $messagesModel,
            'userMessagesModel' => $userMessagesModel,
            'messages' => UserMessages::Model()->findAll($studyId = 'study_id' && ($userId = 'sender_id' || $accountId = 'recipient_id')),
            'selected_message' => $this->loadModel($messageId),
        ));
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