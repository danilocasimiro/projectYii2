<?php

use yii\db\Migration;

/**
 * Class m211219_130021_create_pk_plans
 */
class m211219_130021_create_pk_plans extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_plans', 'plans', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_plans', 'plans');
    }
}
