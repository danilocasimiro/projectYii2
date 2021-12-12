<?php

use yii\db\Migration;

/**
 * Class m211212_120826_create_fk_auth_users_roles
 */
class m211212_120826_create_fk_auth_users_roles extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_auth_users_roles', 'auth_users', 'role_id', 'roles', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_users_roles', 'auth_users');
    }
}
