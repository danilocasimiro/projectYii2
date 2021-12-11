<?php

use yii\db\Migration;

/**
 * Class m210629_114244_Phones
 */
class m210629_114244_Phones extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('phones', [
            'id'=>$this->char(32)->notNull(),
            'auth_user_id'=>$this->char(32)->notNull(),
            'ddd'=>$this->string(5)->notNull(),
            'number'=>$this->string(15)->notNull(),
            'created_at' => $this->dateTime()->defaultValue(date('Y-m-d H:i:s'))->notNull(),
            'deleted_at' => $this->dateTime()
        ], 'ENGINE=InnoDB');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('phones');
    }
}
