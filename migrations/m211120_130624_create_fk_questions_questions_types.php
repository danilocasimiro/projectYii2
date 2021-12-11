<?php

use yii\db\Migration;

/**
 * Class m211120_130624_create_fk_questions_types
 */
class m211120_130624_create_fk_questions_questions_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_questions_types', 'questions', 'question_type_id', 'questions_types', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_questions_types', 'questions');

    }
}
