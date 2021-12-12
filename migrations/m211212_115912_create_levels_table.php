<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%levels}}`.
 */
class m211212_115912_create_levels_table extends Migration
{
     /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('levels', [
            'id'=>$this->char(32)->notNull(),
            'permission_id'=>$this->char(32)->notNull(),
            'rate'=>$this->string(60)->notNull(),
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
        $this->dropTable('{{%levels}}');
    }
}
