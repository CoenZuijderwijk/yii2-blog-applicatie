<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m200306_151844_add_comment_table
 */
class m200306_151844_add_comment_table extends Migration
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
        echo "m200306_151844_add_comment_table cannot be reverted.\n";

        return false;
    }

    public function up() {
        $this->createTable("comment" , [
        'id' => Schema::TYPE_PK,
        'blog_id' => $this->integer()->notNull(),
        'publish_date' => $this->dateTime()->notNull(),
        'title' => $this->string()->notNull(),
        'slug' => $this->text()->notNull(),
    ]);

        $this->addForeignKey(
            'fk-comment-blog_id',
            'comment',
            'blog_id',
            'blog',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function down() {
        $this->dropTable("comment");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200306_151844_add_comment_table cannot be reverted.\n";

        return false;
    }
    */
}
