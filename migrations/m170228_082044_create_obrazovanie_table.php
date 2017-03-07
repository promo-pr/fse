<?php

use yii\db\Migration;

/**
 * Handles the creation of table `obrazovanie`.
 */
class m170228_082044_create_obrazovanie_table extends Migration
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

        $this->createTable('{{%obrazovanie}}', [
            'id' => $this->primaryKey(),
            'fid' => $this->integer(),
            'type'=>$this->string(),
            'name'=>$this->string(),
            'year' => $this->integer(),
            'specialty' => $this->string(),
            'diplom' => $this->string(),
            'qualifications' => $this->string(),
            'sort_order'=> $this->integer(),
        ], $tableOptions);
        $this->createIndex('idx-obrazovanie-name', '{{%obrazovanie}}', 'name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%obrazovanie}}');
    }
}
