<?php

use yii\db\Migration;

/**
 * Class m200306_104825_alter_blog_table
 */
class m200306_104825_alter_blog_table extends Migration
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
        echo "m200306_104825_alter_blog_table cannot be reverted.\n";

        return false;
    }

    public function up() {
        $this->addColumn("blog", "file", \yii\db\Schema::TYPE_TEXT);
    }

    public function down() {
        $this->dropColumn("blog", "file");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200306_104825_alter_blog_table cannot be reverted.\n";

        return false;
    }
    */
}
