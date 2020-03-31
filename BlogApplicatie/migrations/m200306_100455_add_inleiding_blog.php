<?php
namespace app\migrations;
use yii\db\Migration;

/**
 * Class m200306_100455_add_inleiding_blog
 */
class m200306_100455_add_inleiding_blog extends Migration
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
        echo "m200306_100455_add_inleiding_blog cannot be reverted.\n";

        return false;
    }

    public function up() {
        $this->addColumn("blog", "inleiding", \yii\db\Schema::TYPE_STRING . " NOT NULL");
    }

    public function down() {
        $this->dropColumn("blog", "inleiding");
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200306_100455_add_inleiding_blog cannot be reverted.\n";

        return false;
    }
    */
}
