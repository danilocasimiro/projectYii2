<?php

use yii\db\Migration;

/**
 * Class m210630_172727_Companies
 */
class m210630_172727_Companies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('companies', [
            'id'=>$this->primaryKey(),
            'auth_user_id'=>$this->integer()->notNull(),
            'name'=>$this->string(60)->notNull(),
            'foundation'=>$this->dateTime()->notNull(),
            'cnpj'=>$this->string(18)->notNull(),
            
        ]);

        $this->addForeignKey('fk_companies_auth_user_id', 'companies', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_companies_auth_user_id', 'companies');
        $this->dropTable('auth_users');
    }
}
