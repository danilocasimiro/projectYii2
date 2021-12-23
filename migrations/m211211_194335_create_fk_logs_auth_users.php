<?php

use yii\db\Migration;

/**
 * Class m211211_194335_create_fk_logs_auth_users
 */
class m211211_194335_create_fk_logs_auth_users extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_logs_auth_users', 'logs', 'auth_user_id', 'auth_users', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_logs_auth_users', 'logs');
    }
}
