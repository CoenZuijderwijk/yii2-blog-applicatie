<?php
namespace app\migrations;
use yii\db\Migration;

use yii\db\Schema;

/**
 * Class m200305_100125_add_blog_table
 */
class m200305_100125_add_blog_table extends Migration
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
        echo "m200305_100125_add_blog_table cannot be reverted.\n";

        return false;
    }

    public function up() {
       $this->createTable("blog" , [
           'id' => Schema::TYPE_PK,
           'author_id' => $this->integer()->notNull(),
           'publish_date' => $this->dateTime()->notNull(),
           'title' => $this->string()->notNull(),
           'slug' => $this->text()->notNull(),
       ]);

       $this->addForeignKey(
           'fk-post-author_id',
           'blog',
           'author_id',
           'user',
           'id',
           'CASCADE',
           'CASCADE'
       );
    }

    public function down() {
        $this->dropTable("blog");
        $this->dropForeignKey("fk-post-author_id", "blog");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200305_100125_add_blog_table cannot be reverted.\n";

        return false;
    }
    */
}
