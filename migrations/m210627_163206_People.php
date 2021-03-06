<?php

use yii\db\Migration;

/**
 * Class m210627_163206_people
 */
class m210627_163206_people extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('people', [
            'id'=>$this->char(32)->notNull(),
            'auth_user_id'=>$this->char(32)->notNull(),
            'name'=>$this->string(60)->notNull(),
            'birthdate'=>$this->dateTime()->notNull(),
            'genre'=> "ENUM('male', 'female', 'undefined')",
            'friendly_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
            
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('people');
    }
}
