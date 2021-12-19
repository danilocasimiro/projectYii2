<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%plans}}`.
 */
class m211219_130014_create_plans_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('plans', [
            'id'=>$this->char(32)->notNull(),
            'name'=>$this->string(255)->notNull(),
            'description' => $this->string(255)->notNull(),
            'value' => $this->decimal(5,2)->notNull(),
            'subscription_period' => $this->integer()->notNull(),
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
        $this->dropTable('{{%plans}}');
    }
}
