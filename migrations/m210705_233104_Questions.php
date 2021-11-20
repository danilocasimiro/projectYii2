<?php

use yii\db\Migration;

/**
 * Class m210705_233104_Questions
 */
class m210705_233104_Questions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('questions', [
            'id'=>$this->char(32)->notNull(),
            'researche_id'=>$this->char(32)->notNull(),
            'type_id'=>$this->char(32)->notNull(),
            'text'=>$this->string(60)->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('questions');

    }
}
