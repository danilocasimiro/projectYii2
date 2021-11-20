<?php

use yii\db\Migration;

/**
 * Class m211120_124400_add_initial_data_user_types
 */
class m211120_124400_add_initial_data_user_types extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $types = [
            ['id' => '89defae676abd3e3a42b41df17c40096', 'type' => 'Admin'],
            ['id' => '63373b41cf913e9f9b3226b4a0452737', 'type' => 'Empresa'],
            ['id' => 'c142ba19c1d6285b1a4516c25f25aef0', 'type' => 'Colaborador'],
            ['id' => '265c94f442d2d396f232d589da655532', 'type' => 'Usuário']
        ];
        \Yii::$app->db
        ->createCommand()
        ->batchInsert('user_types', ['id', 'type'], $types)
        ->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        return true;
    }
}
