<?php

use yii\db\Migration;

/**
 * Class m211212_111217_create_pk_permissions
 */
class m211212_111217_create_pk_permissions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_permissions', 'permissions', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_permissions', 'permissions');
    }
}
