<?php

use yii\db\Migration;

/**
 * Class m211214_220244_create_fk_users_questions_answers_auth_users
 */
class m211214_220244_create_fk_users_questions_answers_auth_users extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_users_questions_answers_auth_users', 'users_questions_answers', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_users_questions_answers_auth_users', 'users_questions_answers');
    }
}
