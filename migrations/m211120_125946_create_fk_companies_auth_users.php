<?php

use yii\db\Migration;

/**
 * Class m211120_125946_create_fk_companies_auth_users
 */
class m211120_125946_create_fk_companies_auth_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_companies_auth_users', 'companies', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_companies_auth_users', 'companies');

    }
}
