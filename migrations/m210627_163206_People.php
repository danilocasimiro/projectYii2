<?php

use yii\db\Migration;

/**
 * Class m210627_163206_People
 */
class m210627_163206_People extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('people', [
            'id'=>$this->primaryKey(),
            'auth_user_id'=>$this->integer()->notNull(),
            'name'=>$this->string(60)->notNull(),
            'birthday'=>$this->dateTime()->notNull(),
            'sex'=>$this->string(1)->notNull(),
            
        ]);

        $this->addForeignKey('fk_people_auth_user_id', 'people', 'auth_user_id', 'auth_users', 'id', 'CASCADE', 'RESTRICT');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_people_auth_user_id', 'people');
        $this->dropTable('auth_users');
    }

  
}
