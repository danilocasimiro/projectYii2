<?php

use yii\db\Migration;

/**
 * Class m210627_130019_AuthUsers
 */
class m210627_130019_AuthUsers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('auth_users', [
            'id'=>$this->char(32)->notNull(),
            'email'=>$this->string(45)->notNull(),
            'password'=>$this->string(60)->notNull(),
            'type'=> "ENUM('Admin', 'Empresa', 'Colaborador', 'Usuário')",
            'auth_user_id'=>$this->char(32),
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
