<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies_plans}}`.
 */
class m211219_130105_create_companies_plans_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('companies_plans', [
            'id' => $this->char(32)->notNull(),
            'company_id' => $this->char(32)->notNull(),
            'plan_id' => $this->char(32)->notNull(),
            'monthly_payment' => $this->decimal(5,2)->notNull(),
            'due_date' => $this->dateTime()->notNull(),
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
        $this->dropTable('{{%companies_plans}}');
    }
}
