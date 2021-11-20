<?php

use yii\db\Migration;

/**
 * Class m211120_124702_create_pk_people
 */
class m211120_124702_create_pk_people extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_people', 'people', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_people', 'people');
    }
}
