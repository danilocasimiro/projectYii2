<?php

use yii\db\Migration;

/**
 * Class m211212_120120_create_fk_auth_users_levels_auth_users
 */
class m211212_120120_create_fk_auth_users_levels_auth_users extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_auth_users_levels_auth_users', 'auth_users_levels', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_users_levels_auth_users', 'auth_users_levels');
    }
}
