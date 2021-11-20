<?php

use yii\db\Migration;

/**
 * Class m211120_131149_create_pk_answers
 */
class m211120_131149_create_pk_answers extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addPrimaryKey('pk_answers', 'answers', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_answers', 'answers');
    }
}
