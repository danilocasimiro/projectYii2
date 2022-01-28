<?php

use yii\db\Migration;

/**
 * Class m211219_130121_create_fk_companies_plans_companies
 */
class m211219_130121_create_fk_companies_plans_companies extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_companies_plans_companies', 'companies_plans', 'company_id', 'companies', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_companies_plans_companies', 'companies_plans');
    }
}
