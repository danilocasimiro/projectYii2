<?php

use yii\db\Migration;

/**
 * Class m211120_124439_create_pk_auth_users
 */
class m211120_124439_create_pk_auth_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_auth_users', 'auth_users', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_auth_users', 'auth_users');
    }
}
