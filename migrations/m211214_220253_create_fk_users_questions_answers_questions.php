<?php

use yii\db\Migration;

/**
 * Class m211214_220253_create_fk_users_questions_answers_questions
 */
class m211214_220253_create_fk_users_questions_answers_questions extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_users_questions_answers_questions', 'users_questions_answers', 'question_id', 'questions', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_users_questions_answers_questions', 'users_questions_answers');
    }
}
