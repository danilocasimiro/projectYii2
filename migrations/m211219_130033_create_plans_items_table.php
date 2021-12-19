<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%plans_items}}`.
 */
class m211219_130033_create_plans_items_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('plans_items', [
            'id'=>$this->char(32)->notNull(),
            'plan_id'=>$this->char(32)->notNull(),
            'item'=> "ENUM('employee', 'research')",
            'limit' => $this->integer()->notNull(),
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
        $this->dropTable('{{%plans_items}}');
    }
}
