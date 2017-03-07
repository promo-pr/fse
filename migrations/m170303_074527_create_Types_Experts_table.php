<?php

use yii\db\Migration;

/**
 * Handles the creation of table `Types_Experts`.
 */
class m170303_074527_create_Types_Experts_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('Types_Experts', [
            'id' => $this->primaryKey(),
            'fid' => $this->integer(),
            'type'=>$this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('Types_Experts');
    }
}
