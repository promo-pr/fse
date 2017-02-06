<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reestr`.
 */
class m170206_063129_create_reestr_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%reestr}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-reestr-name', '{{%reestr}}', 'name');
    }

    public function down()
    {
        $this->dropTable('{{%reestr}}');
    }
}
