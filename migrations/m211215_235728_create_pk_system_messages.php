<?php

use yii\db\Migration;

/**
 * Class m211215_235728_create_pk_system_messages
 */
class m211215_235728_create_pk_system_messages extends Migration
{
      /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_system_messages', 'system_messages', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_system_messages', 'system_messages');
    }
}
