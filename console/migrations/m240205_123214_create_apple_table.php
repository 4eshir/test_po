<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%apple}}`.
 */
class m240205_123214_create_apple_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%apple}}', [
            'id' => $this->primaryKey(),
            'color' => $this->string(50),
            'create_date' => $this->dateTime(),
            'falling_date' => $this->dateTime(),
            'status_id' => $this->integer(),
            'integrity_percent' => $this->integer(),
            'type_id' => $this->integer(),
        ]);

        $this->createTable('{{%status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
        ]);

        $this->createTable('{{%type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50),
        ]);

        $this->addForeignKey(
            'fk_status_apple_1',
            'apple',
            'status_id',
            'status',
            'id',
            'RESTRICT'
        );

        $this->addForeignKey(
            'fk_type_apple_1',
            'apple',
            'type_id',
            'type',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_status_apple_1', 'apple');
        $this->dropForeignKey('fk_type_apple_1', 'apple');
        $this->dropTable('{{%status}}');
        $this->dropTable('{{%apple}}');
    }
}
