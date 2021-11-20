<?php

use yii\db\Migration;

/**
 * Class m211120_124241_create_pk_user_types
 */
class m211120_124241_create_pk_user_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_user_types', 'user_types', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_user_types', 'user_types');
    }
}
