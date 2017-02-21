<?php

use yii\db\Migration;

/**
 * Handles the creation of table `types_expertiz`.
 */
class m170221_064240_create_types_expertiz_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%types_expertiz}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
        ], $tableOptions);

        $this->createIndex('idx-types_expertiz-name', '{{%types_expertiz}}', 'name');
    }
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%types_expertiz}}');
    }
}
