<?php

use yii\db\Migration;

/**
 * Class m211120_130341_create_pk_questions_types
 */
class m211120_130341_create_pk_questions_types extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_questions_types', 'questions_types', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_questions_types', 'questions_types');
    }
}
