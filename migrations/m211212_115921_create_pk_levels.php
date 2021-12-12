<?php

use yii\db\Migration;

/**
 * Class m211212_115921_create_pk_levels
 */
class m211212_115921_create_pk_levels extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_levels', 'levels', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_levels', 'levels');
    }
}
