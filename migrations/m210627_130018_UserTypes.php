<?php

use yii\db\Migration;

/**
 * Class m210627_130018_UserTypes
 */
class m210627_130018_UserTypes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_types', [
            'id'=>$this->char(32)->notNull(),
            'type'=>$this->char(60)->notNull(), 
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_types');
    }
}
