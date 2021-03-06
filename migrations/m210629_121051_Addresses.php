<?php

use yii\db\Migration;

/**
 * Class m210629_121051_addresses
 */
class m210629_121051_addresses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('addresses', [
            'id'=>$this->char(32)->notNull(),
            'auth_user_id'=>$this->char(32)->notNull(),
            'street'=>$this->string(50)->notNull(),
            'number'=>$this->string(15)->notNull(),
            'district'=>$this->string(30)->notNull(),
            'city'=>$this->string(30)->notNull(),
            'state'=>$this->string(30)->notNull(),
            'country'=>$this->string(30)->notNull(),
            'zipcode'=>$this->string(15)->notNull(),
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
        $this->dropTable('addresses');
    }
}
