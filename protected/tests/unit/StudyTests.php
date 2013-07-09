<?php
//Yii:import('application.models.Commissions');
class StudyTest extends CDbTestCase {

	public $fixtures = array(
			'user' => 'User',
			'study' => 'Study',
	);

	public function testCreate() {
		// insert a comment in pending status
		$study = new Study;
		$study->setAttributes(array(
				'name' => 'test 2',
				'type_id' => 8,
				'created' => time(),
				'description' => 'This is a test 3',
				//'postId' => $this->posts['sample1']['id'],
						), false);
		$this->assertTrue($study->save(false));

		// verify the comment is in pending status
		/*$comment = Comment::model()->findByPk($comment->id);
		$this->assertTrue($comment instanceof Comment);
		$this->assertEquals(Comment::STATUS_PENDING, $comment->status);

		// call approve() and verify the comment is in approved status
		$comment->approve();
		$this->assertEquals(Comment::STATUS_APPROVED, $comment->status);
		$comment = Comment::model()->findByPk($comment->id);
		$this->assertEquals(Comment::STATUS_APPROVED, $comment->status);*/
	}

	/*
	 * To change this template, choose Tools | Templates
	 * and open the template in the editor.
	 */
}