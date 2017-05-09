<?php

use yii\db\Migration;

class m170504_031451_tbl_post extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{tbl_post}}', [
            'id' => $this->primaryKey(),
            'postName' => $this->string()->notNull(),
            'slug' => $this->string()->notNull()->unique(),
            'image' => $this->string(),
            'description' => $this->string(), //mô tả ngắn
            'content' => $this-> text()->notNull(),

            'groups_id' => $this->integer()->notNull(),
            'cate_id' => $this->integer()->notNull(),
            'tags'=> $this->string(),

            'status' => $this->smallInteger()->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{tbl_post}}');
    }
}
