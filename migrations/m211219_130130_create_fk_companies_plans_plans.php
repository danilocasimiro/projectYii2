<?php

use yii\db\Migration;

/**
 * Class m211219_130130_create_fk_companies_plans_plans
 */
class m211219_130130_create_fk_companies_plans_plans extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_ompanies_plans_plans', 'companies_plans', 'plan_id', 'plans', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_ompanies_plans_plans', 'companies_plans');
    }
}
