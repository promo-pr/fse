<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Contact_experts`.
 */
class m170215_132759_create_Contact_experts_table extends Migration
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

        $this->createTable('{{%Contact_experts}}', [
            'id' => $this->primaryKey(),
            'county' => $this->integer(),
            'fio' => $this->string(),
            'work_exp' => $this->string(),
            'degree'=>$this->string(),
            'partaker'=>$this->string(),
            'region' => $this->string(),
            'company' => $this->string(),
            'post' => $this->string(),
            'types_work' => $this->string(),
            'adress' => $this->string(),
            'phone' => $this->string(),
            'mail' => $this->string(),
            'site' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'slug' => $this->string(),
        ], $tableOptions);
        $this->createIndex('idx-Contact_experts-fio', '{{%Contact_experts}}', 'fio');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%Contact_experts}}');
    }
}
