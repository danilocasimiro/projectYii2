<?php

use yii\db\Migration;

/**
 * Class m211219_130040_create_pk_plans_items
 */
class m211219_130040_create_pk_plans_items extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_plans_items', 'plans_items', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_plans_items', 'plans_items');
    }
}
