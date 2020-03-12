<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200312_140633_add_attachments_table
 */
class m200312_140633_add_attachments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200312_140633_add_attachments_table cannot be reverted.\n";

        return false;
    }

    public function up() {
        $this->dropColumn('blog', 'attachment');
        $this->createTable('attachment', [
            'id' => Schema::TYPE_PK,
            'blog_id' => $this->integer()->notNull(),
            'file_name' => Schema::TYPE_STRING,
            'file_extension' => Schema::TYPE_STRING,
            'file_full_name' => Schema::TYPE_TEXT,
        ]);

        $this->addForeignKey(
            'fk-attachment-blog_id',
            'attachment',
            'blog_id',
            'blog',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down() {
        $this->addColumn('blog', 'attachment', Schema::TYPE_TEXT);
        $this->dropTable('attachment');
        $this->dropForeignKey('fk-attachment-blog_id', 'attachment');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200312_140633_add_attachments_table cannot be reverted.\n";

        return false;
    }
    */
}
