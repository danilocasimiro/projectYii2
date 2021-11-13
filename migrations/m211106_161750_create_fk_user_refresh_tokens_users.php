<?php

use yii\db\Migration;

/**
 * Class m211106_161750_create_fk_user_refresh_tokens_users
 */
class m211106_161750_create_fk_user_refresh_tokens_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_user_refresh_tokens_users', 'users_refresh_tokens', 'user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_user_refresh_tokens_users', 'users_refresh_tokens');
    }
}
