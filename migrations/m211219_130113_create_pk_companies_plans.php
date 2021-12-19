<?php

use yii\db\Migration;

/**
 * Class m211219_130113_create_pk_companies_plans
 */
class m211219_130113_create_pk_companies_plans extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_companies_plans', 'companies_plans', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_companies_plans', 'companies_plans');
    }
}
