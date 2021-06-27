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
            'id'=>$this->primaryKey(),
            'email'=>$this->string(45),
            'password'=>$this->string(60),
            'authKey'=>$this->string(45),
            'acessToken'=>$this->string(45)
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210627_130019_AuthUsers cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210627_130019_AuthUsers cannot be reverted.\n";

        return false;
    }
    */
}
