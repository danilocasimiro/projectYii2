<?php

use yii\db\Migration;

/**
 * Class m211106_161127_create_pk_user_refresh_token
 */
class m211106_161127_create_pk_user_refresh_token extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_user_refresh_token', 'users_refresh_tokens', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_user_refresh_token', 'users_refresh_tokens');
    }
}
