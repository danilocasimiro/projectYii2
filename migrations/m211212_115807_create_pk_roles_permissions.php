<?php

use yii\db\Migration;

/**
 * Class m211212_115807_create_pk_roles_permissions
 */
class m211212_115807_create_pk_roles_permissions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_roles_permissions', 'roles_permissions', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_roles_permissions', 'roles_permissions');
    }
}
