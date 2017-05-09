<?php

use yii\db\Migration;

class m170504_170339_tbl_posttag extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{tbl_posttag}}', [
            'id' => $this->primaryKey(),
            'tag_id' => $this->integer(),
            'post_id' => $this->integer(),

        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{tbl_posttag}}');
    }
}
