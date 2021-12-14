<?php

use yii\db\Migration;

/**
 * Class m211214_220234_create_pk_users_questions_answers
 */
class m211214_220234_create_pk_users_questions_answers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_users_questions_answers', 'users_questions_answers', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_users_questions_answers', 'users_questions_answers');
    }
}
