<?php

use yii\db\Migration;

/**
 * Class m210705_233057_Researches
 */
class m210705_233057_Researches extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('researches', [
            'id'=>$this->char(32)->notNull(),
            'auth_user_id'=>$this->char(32)->notNull(),
            'title'=>$this->string(40)->notNull(),
            'description'=>$this->string(60)->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('researches');
    }
}
