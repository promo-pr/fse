<?php

use yii\db\Migration;

/**
 * Handles the creation for table `page`.
 */
class m160611_134542_create_page_table extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'title' => $this->string()->notNull(),
            'body' => $this->text(),
            'slug' => $this->string(),
            'seotitle' => $this->string(),
            'keywords' => $this->string(),
            'description' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);

        $this->createIndex('idx-page-slug', '{{%page}}', 'slug');

      $this->createTable('{{%page_category}}', [
        'id' => $this->primaryKey(),
        'title' => $this->string()->notNull(),
        'body' => $this->text(),
        'slug' => $this->string(),
      ], $tableOptions);

        $this->createIndex('idx-page-category-slug', '{{%page_category}}', 'slug');
    }

    public function down()
    {
        $this->dropTable('{{%page}}');
        $this->dropTable('{{%page_category}}');
    }
}
