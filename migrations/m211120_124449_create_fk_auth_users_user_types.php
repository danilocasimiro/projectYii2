<?php

use yii\db\Migration;

/**
 * Class m211120_124449_create_fk_auth_users_user_types
 */
class m211120_124449_create_fk_auth_users_user_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_auth_users_user_types', 'auth_users', 'user_type_id', 'user_types', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_users_user_types', 'auth_users');

    }
}
