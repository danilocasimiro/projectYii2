<?php

use yii\db\Migration;

/**
 * Class m211120_130341_create_pk_types
 */
class m211120_130341_create_pk_types extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_types', 'types', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_types', 'types');
    }
}
