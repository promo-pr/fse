<?php

use yii\db\Migration;

/**
 * Handles the creation of table `page_category`.
 */
class m170215_110929_create_page_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('page_category', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'body' => $this->text(),
            'slug' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('page_category');
    }
}
