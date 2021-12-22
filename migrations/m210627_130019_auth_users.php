<?php

use yii\db\Migration;

/**
 * Class m210627_130019_auth_users
 */
class m210627_130019_auth_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_users', [
            'id'=>$this->char(32)->notNull(),
            'company_id'=>$this->char(32),
            'role_id'=>$this->char(32)->notNull(),
            'email'=>$this->string(45)->notNull(),
            'password'=>$this->string(60)->notNull(),
            'type'=> "ENUM('Admin', 'Company', 'Employee', 'User')",
            'friendly_id' => $this->integer()->notNull(),
            'company_id'=>$this->char(32),
            'photo'=>$this->string(60),
            'auth_key'=>$this->string(45)->notNull(),
            'access_token'=>$this->string(45)->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
            
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('auth_users');
    }
}
