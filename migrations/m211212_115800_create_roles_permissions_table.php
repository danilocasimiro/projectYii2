<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%roles_permissions}}`.
 */
class m211212_115800_create_roles_permissions_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('roles_permissions', [
            'id'=>$this->char(32)->notNull(),
            'role_id'=>$this->char(32)->notNull(),
            'permission_id'=>$this->char(32)->notNull(),
            'friendly_id' => $this->integer()->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%roles_permissions}}');
    }
}
