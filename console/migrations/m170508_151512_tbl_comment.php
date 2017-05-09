<?php

use yii\db\Migration;

class m170508_151512_tbl_comment extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{tbl_comment}}', [
            'id' => $this->primaryKey(),
            'author' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'content' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{tbl_comment}}');
    }
}
