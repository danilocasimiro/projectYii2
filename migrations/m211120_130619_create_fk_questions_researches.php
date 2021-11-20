<?php

use yii\db\Migration;

/**
 * Class m211120_130619_create_fk_questions_researches
 */
class m211120_130619_create_fk_questions_researches extends Migration
{
       /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_questions_researches', 'questions', 'researche_id', 'researches', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_questions_researches', 'questions');

    }
}
