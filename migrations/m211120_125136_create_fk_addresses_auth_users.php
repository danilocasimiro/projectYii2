<?php

use yii\db\Migration;

/**
 * Class m211120_125136_create_fk_addresses_auth_users
 */
class m211120_125136_create_fk_addresses_auth_users extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_addresses_auth_users', 'addresses', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_addresses_auth_users', 'addresses');

    }
}
