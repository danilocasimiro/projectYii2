<?php

use yii\db\Migration;

/**
 * Class m211120_124906_create_fk_phones_auth_users
 */
class m211120_124906_create_fk_phones_auth_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_phones_auth_users', 'phones', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_phones_auth_users', 'phones');

    }
}
