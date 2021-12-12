<?php

use yii\db\Migration;

/**
 * Class m211212_111123_create_pk_roles
 */
class m211212_111123_create_pk_roles extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_roles', 'roles', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_roles', 'roles');
    }
}
