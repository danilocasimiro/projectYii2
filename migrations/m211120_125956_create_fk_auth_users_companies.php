<?php

use yii\db\Migration;

/**
 * Class m211120_125956_create_fk_auth_users_companies
 */
class m211120_125956_create_fk_auth_users_companies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_auth_users_companies', 'auth_users', 'company_id', 'companies', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_auth_users_companies', 'auth_users');

    }
}
