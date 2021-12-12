<?php

use yii\db\Migration;

/**
 * Class m211211_194327_create_pk_logs
 */
class m211211_194327_create_pk_logs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_logs', 'logs', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_logs', 'logs');
    }
}
