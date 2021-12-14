<?php

use yii\db\Migration;

/**
 * Class m211214_220301_create_fk_users_questions_answers_answers
 */
class m211214_220301_create_fk_users_questions_answers_answers extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_users_questions_answers_answers', 'users_questions_answers', 'answer_id', 'answers', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_users_questions_answers_answers', 'users_questions_answers');
    }
}
