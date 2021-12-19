<?php

use yii\db\Migration;

/**
 * Class m211219_130051_create_fk_plans_items_plans
 */
class m211219_130051_create_fk_plans_items_plans extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk_plans_items_plans', 'plans_items', 'plan_id', 'plans', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_plans_items_plans', 'plans_items');
    }
}
