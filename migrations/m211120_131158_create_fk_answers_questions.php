<?php

use yii\db\Migration;

/**
 * Class m211120_131158_create_fk_answers_questions
 */
class m211120_131158_create_fk_answers_questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_answers_questions', 'answers', 'question_id', 'questions', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_answers_questions', 'answers');

    }
}
