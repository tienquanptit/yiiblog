<?php

use yii\db\Migration;

class m170417_134659_tbl_category extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{tbl_category}}', [
            'id' => $this->primaryKey(),
            'cateName' => $this->string(255)->notNull()->unique(),
            'parent_id' => $this->integer(),
            'keywords' => $this->string(255),
            'description' => $this->string(255),
            'order' => $this->integer()->notNull(),
            'groups_id' => $this->integer()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tbl_category}}');
    }
}
