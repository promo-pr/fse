<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reg_org_sudexp`.
 */
class m170215_132248_create_reg_org_sudexp_table extends Migration
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

        $this->createTable('{{%reg_org_sudexp}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'type_work' => $this->string(),
            'adress' => $this->string(),
            'phone' => $this->string(),
            'mail' => $this->string(),
            'site' => $this->string(),
        ], $tableOptions);
        $this->createIndex('idx-reg_org_sudexp-name', '{{%reg_org_sudexp}}', 'name');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%reg_org_sudexp}}');
    }
}
