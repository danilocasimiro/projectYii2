<?php

use yii\db\Migration;

/**
 * Class m211212_120107_create_pk_auth_users_levels
 */
class m211212_120107_create_pk_auth_users_levels extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_auth_users_levels', 'auth_users_levels', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_auth_users_levels', 'auth_users_levels');
    }
}
