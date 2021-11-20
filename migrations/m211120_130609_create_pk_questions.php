<?php

use yii\db\Migration;

/**
 * Class m211120_130609_create_pk_questions
 */
class m211120_130609_create_pk_questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_questions', 'questions', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_questions', 'questions');
    }
}
