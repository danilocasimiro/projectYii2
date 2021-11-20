<?php

use yii\db\Migration;

/**
 * Class m211120_131160_create_pk_user_refresh_tokens
 */
class m211120_131160_create_pk_user_refresh_tokens extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_user_refresh_tokens', 'users_refresh_tokens', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_user_refresh_token', 'users_refresh_tokens');
    }
}
